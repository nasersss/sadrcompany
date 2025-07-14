<?php

namespace App\Http\Controllers\Services;

use App\Models\User;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\Courses;
use App\Models\Exercise;
use App\Models\UserProfile;
use App\Models\ExerciseDone;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\StudentCourseController;
use App\Models\Evaluation;

class StudentProgressController extends Controller
{
    public static function getNextLesson($courseId, $lessonId)
    {

        $object = new StudentProgressController();
        $lessons = $object->getAllActiveLesson($courseId);
        //loop to return next lesson
        $studentCourse = StudentCourse::with('lessonData')->where('course_id', $courseId)->where('student_id', Auth::id())->first();

        if ($studentCourse->lessonData->topic->is_active == -1) {
            $studentCourse->lesson = $lessons[0]->id;
            $studentCourse->update();
            return redirect()->route('continue_learn', $courseId);
        }

        for ($i = 0; $i + 1 < count($lessons); $i++) {

            if ($lessons[$i]->id == $lessonId) {

                //loop to return next lesson without change studentCourse->lesson in database
                for ($j = 0; $j + 1 < count($lessons); $j++) {
                    if ($lessons[$j]->id == $studentCourse->lesson)
                        if ($j > $i)
                            return StudentProgressController::getLesson($courseId, $lessons[$i + 1]->id);
                }

                $studentCourse->lesson = $lessons[$i + 1]->id;
                $studentCourse->update();
                // return $lessons[$i + 1]->id;
                return redirect()->route('continue_learn', $courseId);
                //return  $continue->continueLearn($courseId);
            }
        }
        // return view('courses.completed-course');
        return redirect()->route('completed_course', $courseId);
    }
    public static function getPreviousLesson($courseId, $lessonId)
    {
        try {
            $object = new StudentProgressController();
            $lessons = $object->getAllActiveLesson($courseId);
            //loop to return next lesson
            for ($i = 0; $i < count($lessons); $i++) {

                if ($lessons[$i]->id == $lessonId) {
                    // $studentCourse = StudentCourse::where('course_id',$courseId)->where('student_id',Auth::id())->first();
                    $lessonId = $lessons[$i - 1]->id;
                    // $studentCourse->update();
                    // return $lessons[$i + 1]->id;
                    // return redirect()->route('continue_learn',$courseId);
                    return  StudentProgressController::getLesson($courseId, $lessonId);
                    //return  $continue->continueLearn($courseId);
                }
            }
            // return view('courses.completed-course');
            return redirect()->route('continue_learn', $courseId)->with(['error' => 'لا يوجد درس سابق لهذا الدرس']);
            // return redirect()->route('completed_course', $courseId);
            // return StudentProgressController::getLesson($courseId,$lessonId-1);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لا يوجد درس سابق لهذا الدرس']);
        }
    }

    public static function getLesson($courseId, $lessonId)
    {
        $course = Courses::where('id', $courseId)->with("trainer", "topic")->first();
        $studentCourse = StudentCourse::with('lessonData')->where('course_id', $courseId)->where('student_id', Auth::id())->first();
        if ($course->topic !== null)
            $course->count = count($course->topic);
        $lesson = Lesson::find($lessonId);
        $inquiryController = new InquiryController();
        $lesson->description = $inquiryController->textFilter($lesson->description);
        return view('courses.continue-learning')->with(['course' => $course, 'lesson' => $lesson, 'studentCourse' => $studentCourse]);
    }

    public function completedCourse($courseId)
    {
        $studentCourse = StudentCourse::with('course')->where('course_id', $courseId)
            ->where('student_id', Auth::id())->first();
        $evaluation = Evaluation::where('course_id',$courseId)->where('student_id',Auth::id())->first();
        $studentCourse->is_completed = 1;
        $studentCourse->update();
        return view('courses.completed-course')->with(['studentCourse'=> $studentCourse,'evaluation'=>$evaluation]);
    }

    /**
     * [Description for getDegree]
     *
     * @param mixed $courseId
     *
     * @return [array info]
     *
     */
    public static function getDegree($courseId, $studentId)
    {
        $exercisesSum = 0;
        $lessons = collect();
        $topics = Topic::with('lesson', 'courses')->where('courses_id', $courseId)->get();
        foreach ($topics as $topic)
            if (!is_null($topic))
                foreach ($topic->lesson as $lesson)
                    $lessons->push($lesson->id);

        $exercises = Exercise::whereIn('lesson_id', $lessons)->get();

        foreach ($exercises as $exercise) {
            $exercisesSum += $exercise->mark;
        }

        $exercisesDoneSum = (int) ExerciseDone::where('student_id', $studentId)->where('course_id', $courseId)->sum('mark');
        $degree = round(($exercisesDoneSum * 100) / $exercisesSum);
        $studentCourse = StudentCourse::where('student_id', $studentId)->where('course_id', $courseId)->first();
        $studentCourse->degree = $degree;
        $studentCourse->update();
    }

    /**
     * [This function will used to get all active lesson as array]
     *
     * @param mixed $courseId
     *
     * @return [array]
     *
     */
    public function getAllActiveLesson($courseId)
    {
        try {
            $topics = Topic::with('lesson')->where('courses_id', $courseId)->where('is_active', 1)->get();
            $lessons = collect();
            //foreach to order all lessons of course
            foreach ($topics as $topic) {
                if (!is_null($topic))
                    foreach ($topic->lesson as $lesson) {
                        if ($lesson->is_active == 1)
                            $lessons->push($lesson);
                    }
            }
            return $lessons;
        } catch (\Throwable $th) {
            return null;
        }
    }



    /**
     * [Description for printCertificate]
     *
     * @param mixed $courseId
     * @param mixed $studentId
     *
     * @return [view certificate]
     *
     */
    public function printCertificate($courseId, $studentId)
    {

        $studentCourse = StudentCourse::with('course')->where('course_id', $courseId)->where('student_id', $studentId)->first();
        $degree = $studentCourse->degree;

        $ARtextDegree = null;
        if ($degree > 89) {
            $ARtextDegree = 'ممتاز';
            $ENtextDegree = 'Excellent';
        } elseif ($degree > 79) {
            $ARtextDegree = 'جيد جداً';
            $ENtextDegree = 'Very Good';
        } elseif ($degree > 74) {
            $ARtextDegree = 'جيد';
            $ENtextDegree = 'Good';
        } elseif ($degree > 49) {
            $ARtextDegree = 'ضعيف';
            $ENtextDegree = 'Pass';
        } else {
            $ARtextDegree = 'راسب';
            $ENtextDegree = 'Fail';
        }
        $studentInfo = UserProfile::where('user_id', $studentId)->first();
        // return [
        //     'ENstudentName' => $studentInfo->en_full_name,
        //     'ARstudentName' => $studentInfo->ar_full_name,
        //     'ARTitle' => $studentCourse->course->title,
        //     'ENTitle' => $studentCourse->course->title_en,
        //     'degree' => $degree,
        //     'ENestimation' => $ENtextDegree,
        //     'ARestimation' => $ARtextDegree,
        //     'hoursNumber' => $studentCourse->course->hours_number,
        //     'gender'=>$studentInfo->gender,
        //     'courseId'=>$courseId,
        //     'studentId'=>$studentId,
        //     'date'=> $studentCourse->updated_at->format('d-m-Y')
        // ];
        return view('courses.certification')->with(
            [
                'ENstudentName' => $studentInfo->en_full_name,
                'ARstudentName' => $studentInfo->ar_full_name,
                'ARTitle' => $studentCourse->course->title,
                'ENTitle' => $studentCourse->course->title_en,
                'degree' => $degree,
                'ENestimation' => $ENtextDegree,
                'ARestimation' => $ARtextDegree,
                'hoursNumber' => $studentCourse->course->hours_number,
                'gender' => $studentInfo->gender,
                'courseId' => $courseId,
                'studentId' => $studentId,
                'date' => $studentCourse->updated_at->format('d/m/Y')
            ]
        );
    }
}
