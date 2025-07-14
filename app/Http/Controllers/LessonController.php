<?php
// google api project name => My Project 32340
// google api project id => mimetic-surfer-368908
namespace App\Http\Controllers;

use App\Download\Download;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;
use App\Models\Topic;
use App\Models\StudentCourse;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topicId)
    {
        try {
             $topic = Topic::with('lesson')->find($topicId);
            return view('admin.lesson.list')->with(['topic' => $topic]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب المحاور']);
        }
    }

    public function create($topicId)
    {
        try {
            $topic = Topic::with('lesson')->find($topicId);
            return view('admin.lesson.modal.add')->with(['topic' => $topic]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب المحاور']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonRequest $request)
    {   
        try {
            
            if($request->videoUrl==null)
             return redirect()->back()->with(['error' => 'عذرا يرجى رفع ملف الفديو']);
            $lesson = new Lesson();
            $lesson->topic_id = $request->topic_id;
            $lesson->title = $request->title;
            $lesson->description = $request->description;
            $lesson->video_url =$request->videoUrl;
            // $lesson->video_url = $request->hasFile('videoUrl') ? Upload::file($request->file('videoUrl'), '/files/lesson/video') : null;
            $lesson->appendix_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/lesson') : null;
            $lesson->save();
            return redirect()->route('lessons_list',$lesson->topic_id)->with(['success' => 'تمت عملية الاضافة بنجاح']);

        } catch (\Throwable$th) {
            $this->deleteVideo($request->videoUrl);
            return redirect()->back()->with(['error' => 'عذرا هناك خطأ لم تتم عملية الاضافة']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($lessonId)
    {
        try {
            $topics = Topic::get();
            $lesson = Lesson::with('topic')->find($lessonId);
            return view('admin.lesson.update')->with(['lesson' => $lesson, 'topics' => $topics]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => ' عذرا هناك خطا لم يتم جلب البيانات ']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request)
    {
        try {
            $lesson = Lesson::find($request->id);
            $lesson->topic_id = $request->topicId;
            $lesson->title = $request->title;
            $lesson->description = $request->description;
            // $lesson->video_url = $request->videoUrl;
            if ($request->hasFile('videoUrl')) {
                if (File::exists('files/lesson/video/' . $lesson->video_url)) {
                    File::delete('files/lesson/video/' . $lesson->video_url);
                }
                $lesson->video_url = $request->hasFile('videoUrl') ? Upload::file($request->file('videoUrl'), '/files/lesson/video') : $lesson->video_url;
            }
            if ($request->hasFile('file')) {
                if (File::exists('files/lesson/' . $lesson->appendix_url)) {
                    File::delete('files/lesson/' . $lesson->appendix_url);
                }
                $lesson->appendix_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/lesson') : $lesson->appendix_url;
            }
            $lesson->update();
            return redirect()->route('lessons_list', $request->topicId)->with(['success' => 'تمت عملية التعديل بنجاح']);
        } catch (\Throwable$th) {
            return redirect()->route('lessons_list', $request->topicId)->with(['error' => 'عذرا هناك خطأ لم تتم عملية التعديل']);
        }
    }

    /**
     * [Description for toggle]
     *
     * @param mixed $courseId
     *
     * @return [type]
     *
     */
    public function toggle($lessonId)
    {

        try {
            $lesson = Lesson::find($lessonId);
            $lesson->is_active *= -1;
            $lesson->save();
            return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Throwable$error) {
            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    public function download($filePath = null)
    {
        try {
            if ($filePath == null) {
                return null;
            }
            return Download::downloadFile("/files/lesson/", $filePath);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم  نستطيع تحميل الملف ']);
        }
    }

    public function uploadVideo(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
    
        if (!$receiver->isUploaded()) {
            // file not uploaded
        }
    
        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
    
            $disk = Storage::disk('public');
            $path = $disk->putFileAs('videos', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }
    
        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function deleteVideo($path)
    {
    
    if(Storage::disk('public')->exists('videos/'.$path)){
            Storage::disk('public')->delete('videos/'.$path);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    
      public function delete($id)
    {
        //  return
        try {
            $studentCourse = StudentCourse::where('lesson', $id)->first();
            if (isset($studentCourse)) {
                return redirect()->back()->with(['error' => 'عذرا لايمكن حذف هذا المحور لأنه مرتبط بتقدم أحد الطلاب']);
            }
            $lesson = Lesson::find($id);
            $this->deleteVideo($lesson->video_url);
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
            $lesson->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء لم يتم حذف البيانات  ']);
        }

    }
}
