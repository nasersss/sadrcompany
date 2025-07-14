<?php

namespace App\Http\Controllers;

use App\Download\Download;
use App\Http\Controllers\Services\StudentProgressController;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Courses;
use App\Models\Exercise;
use App\Models\ExerciseDone;
use App\Models\Lesson;
use App\Models\StudentCourse;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lessonId)
    {
        try {
            $lesson = Lesson::with('exercise')->find($lessonId);
            return view('admin.exercises.list')->with(['lesson' => $lesson]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExerciseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciseRequest $request)
    {
        try {
            $exercise = new Exercise();
            $exercise->lesson_id = $request->lessonId;
            $exercise->description = $request->description;
            $exercise->mark = $request->mark;
            $exercise->file_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/exercise') : null;
            $exercise->save();
            return redirect()->back()->with(['success' => 'تمت عملية الاضافة بنجاح']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطأ لم تتم عملية الاضافة']);
        }
    }

    public function haveExercise($courseId, $lessonId)
    {
        try {
            $studentProgress = new StudentProgressController();
            $exercise = Exercise::with('lesson')->where('lesson_id', $lessonId)->where('is_active',1)->get()->map(function ($item) {
                $exerciseDone = ExerciseDone::where('exercise_id', $item->id)->where('student_id', Auth::id())->first();
                if (is_null($exerciseDone)) {
                    return $item;
                }
            })->reject(function ($item) {
                return empty($item);
            });
            if (count($exercise) > 0) {
                return $this->showExercise($exercise, $courseId, $lessonId);
            }
            return $studentProgress->getNextLesson($courseId, $lessonId);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا   يرجى مراجعة الدعم الفني ']);
        }
    }
    /**
     * [Description for showExercise]
     *
     * @param mixed $exercise
     * @param mixed $courseId
     * @param mixed $lessonId
     *
     * @return [view]
     *
     */
    public function showExercise($exercise, $courseId, $lessonId)
    {
        try {
            $course = Courses::where('id', $courseId)->with("trainer", "topic")->first();
            $studentCourse = StudentCourse::with('lessonData')->where('course_id', $courseId)->where('student_id', Auth::id())->first();
            $lesson = Lesson::find($lessonId);
            return view('exercise.show-exercise')->with([
                'exercise' => $exercise,
                'courseId' => $courseId,
                'lesson' => $lesson,
                'course' => $course,
                'studentCourse' => $studentCourse,
            ]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit($exerciseId)
    {
        try {
            $lessons = Lesson::get();
            $exercise = Exercise::with('lesson')->find($exerciseId);
            return view('admin.exercises.update')->with(['lessons' => $lessons, 'exercise' => $exercise]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExerciseRequest  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciseRequest $request)
    {
        try {
            $exercise = Exercise::find($request->id);
            $exercise->lesson_id = $request->lessonId;
            $exercise->description = $request->description;
            $exercise->mark = $request->mark;
            if ($request->hasFile('file')) {
                if (File::exists('files/exercise/' . $exercise->file_url)) {
                    File::delete('files/exercise/' . $exercise->file_url);
                }
                $exercise->file_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/exercise') : null;
            }
            // $exercise->file_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/exercise') : $exercise->file_url;
            $exercise->update();
            return redirect()->route('exercises_list', $exercise->lesson_id)->with(['success' => 'تمت عملية التعديل بنجاح']);
        } catch (\Throwable$th) {
            return redirect()->route('exercises_list', $exercise->lesson_id)->with(['error' => 'عذرا هناك خطأ لم تتم عملية التعديل']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }

    /**
     * [Description for toggle]
     *
     * @param mixed $exerciseId
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function toggle($exerciseId)
    {

        try {
            $exercise = Exercise::find($exerciseId);
            $exercise->is_active *= -1;
            $exercise->update();
            return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Throwable$error) {
            return back()->with(['error' => 'عذرا هناك خطا لم تتم تحديث البيانات']);
        }
    }
        public function delete($id)
    {
        try {
            $exercise = Exercise::find($id);
            if (File::exists('files/exercise/' . $exercise->file_url)) {
                File::delete('files/exercise/' . $exercise->file_url);
            }
            // delete exerciseDone files
            foreach ($exercise->exerciseDone as $exerciseDone) {
                if (File::exists('files/student/exercise/' . $exerciseDone->home_work_url)) {
                    File::delete('files/student/exercise/' . $exerciseDone->home_work_url);
                }
            }
            $exercise->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء لم يتم حذف البيانات  ']);
        }
    }


    public function download($filePath)
    {
        try {
            return Download::downloadFile("/files/exercise/", $filePath);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }

}
