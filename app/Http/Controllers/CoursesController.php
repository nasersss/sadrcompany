<?php

namespace App\Http\Controllers;

use App\Download\Download;
use App\Http\Controllers\TopicController;
use App\Events\QueueWork;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Jobs\SendNotfications;
use App\Models\CourseAppendix;
use App\Models\Courses;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\StudentCourse;
use App\Models\TrainerInfo;
use App\Models\User;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Mail\Notification as MailNotification;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::Train()->get();
            $courses = Courses::with('trainer')->get();
            return view('admin.course.list')->with([
                'courses' => $courses, 'users' => $users,
            ]);
        } catch (\Throwable $th) {
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
        try {
            $trainers = TrainerInfo::with('user')->get();
            return view('admin.course.add')->with('trainers', $trainers);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoursesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesRequest $request)
    {
        try {
            $course = new Courses();
            $course->title = $request->title;
            $course->title_en = $request->titleEn;
            $course->description = $request->description;
            $course->img_url = $request->hasFile('image') ? Upload::file($request->file('image'), '/images/courses') : "defaultImage.png";
            $course->intro_video_url = $request->introYouTubeVideoUrl;
            $course->local_price = $request->localPrice;
            $course->global_price = $request->globalPrice;
            $course->hours_number = $request->hoursNumber;
            $course->trainer_info_id = $request->trainerInfoId;
            $course->appendix_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/courses') : null;

            $course->save();

            NotificationController::sendNotificationFromAdmin($course->trainer->trainer_id, 'لقد تم اضافتك كمدرب على دورة ' . $course->title, "course_review");
            $notify = Notification::where('to_user_id', $course->trainer->trainer_id)->orderBy('id', 'desc')->first();
            $user = User::find($course->trainer->trainer_id);
            try {
                $MailNotification = new MailNotification($notify);
                Mail::to($user->email)->send($MailNotification);
            } catch (\Throwable $th) {
                return back()->with(['error' => 'تم تحديث البيانات بنجاح ولكن هناك خطاء في الاتصال بالانترنت لم يتم ارسال الايميلات']);
            }

            return redirect()->route('courses_list')->with(['success' => 'تمت عملية الاضافة بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('courses_list')->with(['error' => 'عذرا هناك جطأ لم تتم عملية الاضافة']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($courseId)
    {
        try {
            $trainers = TrainerInfo::with('user')->get();
            $course = Courses::with('trainer')->find($courseId);
            return view('admin.course.update')->with([
                'course' => $course, 'trainers' => $trainers,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoursesRequest  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoursesRequest $request)
    {
        try {
            $course = Courses::with('trainer')->find($request->id);
            $oldTrainerId = $course->trainer->trainer_id;
            $newTrainerId = TrainerInfo::find($request->trainerInfoId)->trainer_id;

            $course->title = $request->title;
            $course->title_en = $request->titleEn;
            $course->description = $request->description;
            if ($request->hasFile('image')) {
                if (File::exists('images/courses/' . $course->img_url)) {
                    File::delete('images/courses/' . $course->img_url);
                }
                $course->img_url = $request->hasFile('image') ? Upload::file($request->file('image'), '/images/courses') : "defaultImage.png";
            }
            // if trainer is change will send notification to old trainer
            $course->intro_video_url = $request->introYouTubeVideoUrl;
            $course->local_price = $request->localPrice;
            $course->global_price = $request->globalPrice;
            $course->hours_number = $request->hoursNumber;
            $course->trainer_info_id = $request->trainerInfoId;
            // return $request->hasFile('file');
            if ($request->hasFile('file')) {
                if (File::exists('files/courses/' . $course->appendix_url)) {
                    File::delete('files/courses/' . $course->appendix_url);
                }
                $course->appendix_url = $request->hasFile('file') ? Upload::file($request->file('file'), '/files/courses') : null;
            }
            $course->update();

            if ($oldTrainerId != $newTrainerId) {
                NotificationController::sendNotificationFromAdmin($oldTrainerId, 'لقد تم ازالتك كمدرب من دورة ' . $course->title, "course_review");
                NotificationController::sendNotificationFromAdmin($course->trainer->trainer_id, 'لقد تم اضافتك كمدرب على دورة ' . $course->title, "course_review");
                $notify = Notification::where('to_user_id', $course->trainer->trainer_id)->orderBy('id', 'desc')->first();
                $user = User::find($course->trainer->trainer_id);
                try {
                    $MailNotification = new MailNotification($notify);
                    Mail::to($user->email)->send($MailNotification);
                } catch (\Throwable $th) {
                    return back()->with(['error' => 'تم تحديث البيانات بنجاح ولكن هناك خطاء في الاتصال بالانترنت لم يتم ارسال الايميلات']);
                }
            }
            return redirect()->route('courses_list')->with(['success' => 'تمت عملية التعديل بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('courses_list')->with(['error' => 'عذرا هناك جطأ لم تتم عملية التعديل']);
        }
    }

    /**
     * [Description for toggle]
     *
     * @param mixed $userId
     *
     * @return [type]
     *
     */
    public function toggle($courseId)
    {

        try {
            $courses = Courses::find($courseId); //find($PoliceId);
            $courses->is_active *= -1;
            $courses->save();
            return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses)
    {
        //
    }

    /**
     * [Description for listAppendix]
     *
     * @param mixed $courseId
     *
     * @return [type]
     *
     */
    public function listAppendix($courseId)
    {
        try {
            $course = Courses::with("topic")->find($courseId);
            $appendixes = CourseAppendix::where('course_id', $courseId)->get();
            return view('admin.course.list-appendix')->with(['appendixes' => $appendixes, 'course' => $course]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }

    /**
     * [Description for storeAppendix]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function storeAppendix(Request $request)
    {
        try {
            $appendix = new CourseAppendix();
            $appendix->description = $request->description;
            $appendix->url_type = $request->appendix_type;
            $appendix->course_id = $request->courseId;
            if ($request->appendix_type == '2') {
                $appendix->url = $request->hasFile('file') ? Upload::file($request->file('file'), '/images/courses/appendixes') : null;
            } else {
                $appendix->url = $request->url;
            }
            $appendix->save();

            $studentsCourse = StudentCourse::with('student')->where('course_id', $request->courseId)->get();
            SendNotfications::dispatch($studentsCourse, $appendix);

            return redirect()->route('course_appendix_list', $request->courseId)->with(['success' => 'تم اضافة البيانات بنجاح']);
            // return back()->with(['success' => 'تم اضافة البيانات بنجاح']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    public function deleteAppendix($appendixId)
    {

        try {

            $appendix = CourseAppendix::find($appendixId);
            if ($appendix->url_type == 2 && File::exists('images/courses/appendixes/' . $appendix->url))
                File::delete('images/courses/appendixes/' . $appendix->url);
            $appendix->delete();
            return back()->with(['success' => 'تم حذف ملحق الدورة بنجاح']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

   /**
     * [This method will delete course]
     *
     * @param mixed $id
     *
     * @return [type]
     *
     */
    public function delete($id)
    {
        try {
            $topicController = new TopicController();
            $course = Courses::find($id);
            $studentCourse = StudentCourse::where('course_id', $id)->first();
            if (isset($studentCourse)) {
                return redirect()->back()->with(['error' => 'عذرا لايمكن حذف هذه الدورة لوجود طلاب مشتركين فيها  ']);
            }

            if (File::exists('files/courses/' . $course->appendix_url)) {
                File::delete('files/courses/' . $course->appendix_url);
            }
            foreach ($course->topic as $topic) {
                $topicController->deleteTopic($topic);
                $topic->delete();
            }
            $course->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء لم يتم حذف البيانات  ']);
        }

    }
    /**
     * [Description for downloadAppendix]
     *
     * @param mixed $filePath
     *
     * @return [type]
     *
     */
    public function downloadAppendix($filePath)
    {
        return Download::downloadFile("/images/courses/appendixes/", $filePath);
    }
}
