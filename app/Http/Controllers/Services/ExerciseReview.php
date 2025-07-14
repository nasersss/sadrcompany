<?php

namespace App\Http\Controllers\Services;

use App\Download\Download;
use App\Http\Controllers\Controller;
use App\Jobs\MailCertificate;
use App\Models\Courses;
use App\Models\Exercise;
use App\Models\ExerciseDone;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExerciseReview extends Controller
{
    public function listStudent($courseId)
    {
        try {
            $studentProgress = new StudentProgressController();
            $course = Courses::with('studentCourse')->where('id', $courseId)->first();

            $lessons = $studentProgress->getAllActiveLesson($courseId)->map(function ($item) {
                return $item->id;
            });

            $exercises = Exercise::whereIn('lesson_id', $lessons)->get();

            $exerciseDone = ExerciseDone::whereIn('exercise_id', $exercises->map(function ($item) {
                return $item->id;
            }))->get()->groupBy('student_id');
            
            return view('admin.exercises.review')->with([
                'course' => $course,
                'exercise' => $exercises->count(),
                'exerciseDone' => $exerciseDone,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'لا توجد بيانات لعرضها او ان هناك مشكلة في عرض البيانات');
        }
    }

    /**
     * [Description for checkSpentCertificate]
     *
     * @param mixed $courseId
     *
     * @return [type]
     *
     */
    public function checkSpentCertificate($courseId, $studentId)
    {
        try {
            $studentProgress = new StudentProgressController();
            $lessons = $studentProgress->getAllActiveLesson($courseId)->map(function ($item) {
                return $item->id;
            });
            $exercises = Exercise::where('is_active', 1)->whereIn('lesson_id', $lessons)->get();

            $exerciseDone = ExerciseDone::whereIn('exercise_id', $exercises->map(function ($item) {
                return $item->id;
            }))->where('student_id', $studentId)->where('is_checked_trainer', 1)->get();

            return count($exercises) == count($exerciseDone) ? true : false;
        } catch (\Throwable$th) {
            return false;
        }
    }

    public function spentCertificate($courseId, $studentId)
    {
        try {
            if ($this->checkSpentCertificate($courseId, $studentId)) {
                StudentProgressController::getDegree($courseId, $studentId);
                $course = Courses::find($courseId);
                $user = User::find($studentId);
                MailCertificate::dispatch($user, $course);
            }
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم إسال اشعار الشهادة ']);
        }
    }

    public function StudentExercise($studentId, $courseId)
    {
        try{
        $exercises = ExerciseDone::with("exercise", "student")->where('student_id', $studentId)->where('course_id', $courseId)->get();
        $studentName = $exercises[0]->student->name;
        $studentId = $exercises[0]->student->id;
        return view('admin.exercises.student-exercise')->with([
            'exercises' => $exercises,
            'studentName' => $studentName,
            'studentId' => $studentId,
            'courseId' => $exercises[0]->course_id,
        ]);
    } catch (\Throwable$th) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب  ']);
    }
    }

    /**
     * [Description for storeMark]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function storeMark(Request $request)
    {
        try {
        $exercises = ExerciseDone::with('exercise')->find($request->exerciseId);
        $courseId = $exercises->exercise->lesson->topic->courses_id;

        $exercises->mark = $request->mark;
        $isCheckedTrainer = $exercises->is_checked_trainer;
        $exercises->is_checked_trainer = 1;
        if ($exercises->update()) {
            if ($isCheckedTrainer != 1) {
                $this->spentCertificate($courseId, $exercises->student_id);
            }

            return response()->json([
                'status' => true,
                'mark' => $exercises->mark,
                'id' => $exercises->id,
                'msg' => 'تم حفظ علامة الطالب بنجاح',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'عذرا لم يتم حفظ علامة الطالب',
            ]);
        }
        } catch (\Throwable $th) {
            return  response()->json([
                'status' => false,
                'msg' => 'عذرا لم يتم حفظ علامة الطالب'
            ]);
        }
    }

    /**
     * [Description for downloadExercise]
     *
     * @param mixed $filePath
     *
     * @return [type]
     *
     */
    public function downloadExercise($filePath)
    {
        return Download::downloadFile("/files/student/exercise/", $filePath);
    }

    /**
     * [Description for fetchAllExerciseDone]
     *
     * @param mixed $studentId
     * @param mixed $courseId
     *
     * @return [type]
     *
     */
    public function fetchAllExerciseDone($studentId, $courseId)
    {
        $exercises = ExerciseDone::with('exercise')->where('student_id', $studentId)->where('course_id', $courseId)->get();
        return response()->json(['exercises' => $exercises]);
    }

    /**
     * [Description for deleteExerciseFile]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function deleteExerciseFile(Request $request)
    {

        try{
        $exercise = ExerciseDone::find($request->id);
        if (File::exists('files/student/exercise/' . $exercise->home_work_url)) {
            $exercise->home_work_url = "null";
            $exercise->update();
            File::delete('files/student/exercise/' . $exercise->home_work_url);
            return response()->json([
                'id' => $exercise->id,
                'status' => true,
                'msg' => 'تم حذف الملف بنجاح',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'لايوجد ملف بهذا الاسم',
            ]);
        }
        } catch (\Throwable $th) {
            return  response()->json([
                'status' => false,
                'msg' => 'عذرا هناك خطاء يرجى مراجعة الدعم الفني'
            ]);
        }

    }
}
