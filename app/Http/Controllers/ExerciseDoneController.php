<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\StudentProgressController;
use App\Upload\Upload;
use App\Models\ExerciseDone;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExerciseDoneRequest;
use App\Http\Requests\UpdateExerciseDoneRequest;
use App\Models\Courses;
use App\Models\User;

use function PHPSTORM_META\map;

class ExerciseDoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreExerciseDoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciseDoneRequest $request)
    {
        try {
            if ($this->checkExerciseIsUploaded($request->exerciseId))
                return back()->with(['error' => 'لقد قمت برفع هذا الواجب من قبل']);
            $exercise = new ExerciseController();
            $exerciseDone = new ExerciseDone();
            $exerciseDone->exercise_id = $request->exerciseId;
            $exerciseDone->student_id = Auth::id();
            $exerciseDone->home_work_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/student/exercise') : null;
            $exerciseDone->course_id = $request->courseId;
            $exerciseDone->is_uploaded = 1;
            $exerciseDone->save();

            // notification
            $trainer =  $exerciseDone->exercise->lesson->topic->courses->trainer->trainer_id;
            $course = $exerciseDone->exercise->lesson->topic->courses_id;
           NotificationController::sendNotification($trainer, ' لقد قام الطالب ' . Auth::user()->name . ' برفع واجب جديد '  , "exercise_student/" . Auth::id() . "/$course");
            NotificationController::sendNotificationToAdmin(' لقد قام الطالب ' . Auth::user()->name . ' برفع واجب جديد ', "exercise_student/" . Auth::id() . "/$course");

            return $exercise->haveExercise($request->courseId, $request->lessonId);
            // return StudentProgressController::getNextLesson($request->courseId,$request->lessonId);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطأ لم تتم العملية']);
        }
    }

    /**
     * check if exercise is uploaded by auth student
     *
     * @param mixed $exerciseId
     *
     * @return boolean
     *
     */
    public function checkExerciseIsUploaded($exerciseId)
    {
        return count(ExerciseDone::where('exercise_id', $exerciseId)->where('student_id',Auth::id())->get()) > 0 ? true : false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseDone  $exerciseDone
     * @return \Illuminate\Http\Response
     */
    public function show(ExerciseDone $exerciseDone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExerciseDone  $exerciseDone
     * @return \Illuminate\Http\Response
     */
    public function edit(ExerciseDone $exerciseDone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExerciseDoneRequest  $request
     * @param  \App\Models\ExerciseDone  $exerciseDone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciseDoneRequest $request, ExerciseDone $exerciseDone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseDone  $exerciseDone
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExerciseDone $exerciseDone)
    {
        //
    }
}
