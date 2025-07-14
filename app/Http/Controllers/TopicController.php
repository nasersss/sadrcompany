<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LessonController;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Courses;
use App\Models\StudentCourse;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($courseId)
    {
        try {
            $course = Courses::find($courseId);
            $topics = Topic::where('courses_id', $courseId)->get();
            return view('admin.topics.list')->with(['topics' => $topics, 'course' => $course]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء في جلب البيانات']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTopicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request)
    {

        try {
            $topic = new Topic();
            $topic->courses_id = $request->courseId;
            $topic->title = $request->title;
            $topic->description = $request->description;
            if ($topic->save()) {
                return redirect()->back()->with(['success' => 'تمت إضافة البينات   ']);
            }
            return redirect()->back()->with(['error' => 'عذرا لم تتم إضافة البينات']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء لم يتم حفظ  البيانات']);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicRequest  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        try {     
        $topic = Topic::find($request->topicId);
        $topic->title = $request->title;
        $topic->description = $request->description;
        if ($topic->update()) {
            return redirect()->back()->with(['success' => 'تمت تعديل البينات   ']);
        }
        return redirect()->back()->with(['error' => 'عذرا لم يتم تعديل  البينات']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء لم يتم تعديل  البيانات']);

        }
    }

    public function toggle($topicId)
    {
        try {
          $topic = Topic::where('id', $topicId)->first();
        $topic->is_active *= -1;
        if ($topic->save()) {
        return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        }
        return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }
    
     /**
     * [ delete the topic  ]
     *
     * @param mixed $id
     *
     * @return [type]
     *
     */
    public function delete($id)
    {
        try {
            $topic = Topic::with("lesson")->find($id);
            foreach ($topic->lesson as $lesson) {
                $studentCourse = StudentCourse::where('lesson', $lesson->id)->first();
                if (isset($studentCourse)) {
                    return redirect()->back()->with(['error' => 'عذرا لايمكن حذف هذا المحور لأنه مرتبط بتقدم أحد الطلاب']);
                }

            }
            $this->deleteTopic($topic);
            $topic->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء لم يتم حذف البيانات  ']);
        }

    }

    /**
     * [Description for deleteTopic]
     *
     * @param mixed $topic
     *
     * @return [type]
     *
     */
    public function deleteTopic($topic)
    {
        $lessonController = new LessonController();

        foreach ($topic->lesson as $lesson) {
            //deleted lesson files
            $lessonController->deleteVideo($lesson->video_url);
            if (File::exists('files/lesson/' . $lesson->appendix_url)) {
                File::delete('files/lesson/' . $lesson->appendix_url);
            }
            foreach ($lesson->exercise as $exercise) {
                // delete exercise files
                if (File::exists('files/exercise/' . $exercise->file_url)) {
                    File::delete('files/exercise/' . $exercise->file_url);
                }
                // delete exerciseDone files
                foreach ($exercise->exerciseDone as $exerciseDone) {
                    if (File::exists('files/student/exercise/' . $exerciseDone->home_work_url)) {
                        File::delete('files/student/exercise/' . $exerciseDone->home_work_url);
                    }
                }
            }

        }
    }
}
