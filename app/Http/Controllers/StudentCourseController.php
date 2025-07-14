<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lesson;
use App\Upload\Upload;
use App\Models\Courses;
use App\Download\Download;
use App\Models\TrainerInfo;
use App\Models\Notification;
use App\Models\StudentCourse;
use App\Models\CourseAppendix;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\InquiryController;
use App\Mail\Notification as MailNotification;
use App\Http\Requests\StoreStudentCourseRequest;
use App\Http\Requests\UpdateStudentCourseRequest;
use App\Http\Controllers\Services\StudentProgressController;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            return $studentCourse = StudentCourse::with("student", "course")->get()->map(function ($item) {
                $trainer = TrainerInfo::find($item->course->trainer_info_id);
                $item->course->trainer_description = $trainer->description;
                $item->course->trainer_name = User::find($trainer->trainer_id)->name;
                return $item;
            });
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
        }

    }

    public function listUnActiveStudentsCourses()
    {
        try {
            // $orders = StudentCourse::with("student", "course")->where('is_active', -1)->get();
            $orders = StudentCourse::with("student", "course")->get();
            return view('admin.course.listٍ-student-orders')->with('orders', $orders);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Courses $course)
    {
        try {
            $studentCourse = StudentCourse::where('course_id', $course->id)->where('student_id', Auth::id())->first();
            if (isset($studentCourse)) {
                if ($studentCourse->is_active == 1) {
                    return redirect()->route('continue_learn', $course->id)->with(['success' => ' نتمنى  لك رحلة تعليمية ممتعة ']);
                } else {
                    return redirect()->route('course_details', $course->id)->with(['error' => 'لقد اشتركت في هذه الدورة من قبل']);
                }

            }
            return view('courses.subscribe-course')->with("course", $course);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentCourseRequest $request)
    {
        if (!Auth::check()) {
            
            return redirect()->route('login')->with(['error' => 'عذرا لا تملك الصلاحية لدخول هذه الصفخة يرجى تسجيل الدخول او انشاء حساب']);
        }
        if(!$request->hasFile('receiptImage'))
        return back()->with(['error' => 'عذرا الرجاء إرفاق صورة السند']);
        try {
            $admin = User::where('role',0)->first();
            $course = Courses::with("topic")->find($request->courseId);
            $studentCourse = new StudentCourse();
            $isSuperscription = StudentCourse::query()->where('student_id', $request->studentId)->where('course_id', $request->courseId)->first();
            if (isset($isSuperscription)) {
                if ($isSuperscription->is_active == 0) {
                    $studentCourse = $isSuperscription;
                    $studentCourse->is_active = -1;
                } else {
                    return redirect()->route('dash-user')->with(['error' => 'لقد سجلت في هذه الدورة من قبل']);
                }
            }
            $studentCourse->student_id = $request->studentId;
            $studentCourse->course_id = $request->courseId;
            $studentCourse->lesson = $course->topic[0]->lesson[0]->id;
            $studentCourse->receipt_img_url = $request->hasFile('receiptImage') ? Upload::file($request->file('receiptImage'), '/receipt') : null;

            if ($studentCourse->save()) {
                NotificationController::sendNotificationFromAdmin(Auth::id(), 'شكرا لإشتراكك معنا سيتم مراجعة طلبك في أقراب وقت   ', 'dash-user');
                NotificationController::sendNotificationToAdmin('تم الاشتراك في احد الدورات', 'listUnActiveStudentsCourses',4);
                $notify = Notification::where('to_user_id', $admin->id)->orderBy('id', 'desc')->first();
                // $user = User::find($order->student_id);

                try {
                    $MailNotification = new MailNotification($notify);
                    Mail::to($admin->email)->send($MailNotification);
                } catch (\Throwable$th) {
                    return back()->with(['error' => 'تم تحديث البيانات بنجاح ولكن هناك خطاء في الاتصال بالانترنت لم يتم ارسال الايميلات']);
                }

                return redirect()->route('dash-user')->with(['success' => 'شكرا لإنضمامك معنا سيتم مراجعة طلبك في أقرب وقت  ']);
            }
            return redirect()->route('dash-user')->with(['error' => 'عذرا لم نستطيع تخزن طلبك  ']);
        } catch (\Throwable$th) {
            return redirect()->route('dash-user')->with(['error' => 'يرجى مراجعة الدعم الفني  ']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            return $courses = StudentCourse::with(["student", "course"])->where('student_id', Auth::id())->get()->map(function ($item) {
                $item = Courses::with('trainer')->find($item->course->id);
                return $item;
            })->unique();
            return view('admin.course.listٍ-student-courses')->with('courses', $courses);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب  البيانات ']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentCourseRequest  $request
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentCourseRequest $request, StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * [Description for continueLearn]
     *
     * @param mixed $courseId
     *
     * @return [view]
     *
     */
    public function continueLearn($courseId)
    {
        try {
            $student = User::with('profile')->find(Auth::id());
            if ($student->profile === null) {
                return redirect()->route('create_profile')->with(['success' => 'شكرا لإنضمامك معنا سيتم مراجعة طلبك في أقرب وقت ,يجب  استكمال تعبئة بياناتك بشكل صحيح']);
            } 
            // else if ($student->profile->ar_full_name == null || $student->profile->en_full_name == null || $student->profile->gender == null) {
            //     return redirect()->route('edit_profile')->with(['success' => 'شكرا لإنضمامك معنا سيتم مراجعة طلبك في أقرب وقت ,يجب  استكمال تعبئة بياناتك بشكل صحيح']);
            // }

            $course = Courses::where('id', $courseId)->with("trainer", "topic")->where('is_active',1)->first();
            if($course == null)
                return redirect()->route('course')->with(['error' => 'عذرا لايمكنك الوصول الى هذه الدورة, هذه الدورة ملغية من قبل مدير النظام']);

            $studentCourse = StudentCourse::with('lessonData')->where('course_id', $courseId)->where('student_id', Auth::id())->first();
            if ($course->topic !== null) {
                $course->count = count($course->topic);
            }

            $lesson = StudentCourse::with('lessonData')->where('student_id', Auth::user()->id)->where('course_id', $courseId)->first();
            if($lesson->lessonData->topic->is_active == -1)
                return StudentProgressController::getNextLesson($courseId, $lesson->lessonData->id);
            $lesson = Lesson::where('is_active',1)->find($lesson->lessonData->id);

            $inquiryController = new InquiryController();
            $lesson->description=$inquiryController->textFilter($lesson->description);
            return view('courses.continue-learning')->with(['course' => $course, 'lesson' => $lesson, 'studentCourse' => $studentCourse]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم البيانات ']);
        }
    }

    public function toggle($orderId, $status)
    {
        try {
            $order = StudentCourse::find($orderId);
            $course = Courses::with("topic")->find($order->course_id);
            if ($status) {
                $order->is_active = 1;
                $order->lesson = $course->topic[0]->lesson[0]->id;
                $order->update();
                // File::delete("receipt/$order->receipt_img_url");
                NotificationController::sendNotificationFromAdmin($order->student_id, 'لقد تم تاكيد اشتراكك في دورة ' . $course->title, 'dash-user' ,1);
                $notify = Notification::where('to_user_id', $order->student_id)->orderBy('id', 'desc')->first();
                $user = User::find($order->student_id);

                try {
                    $MailNotification = new MailNotification($notify);
                    Mail::to($user->email)->send($MailNotification);
                } catch (\Throwable$th) {
                    return back()->with(['error' => 'تم تحديث البيانات بنجاح ولكن هناك خطاء في الاتصال بالانترنت لم يتم ارسال الايميلات']);
                }
            } else {
                File::delete("receipt/$order->receipt_img_url");
                $order->is_active = 0;
                $order->update();
                NotificationController::sendNotificationFromAdmin($order->student_id, 'عذرا لقد تم الغاء طلبك للاشتراك في دورة ' . $course->title . ' يرجا التاكد من سند الحوالة والمحاولة مجددا ', "course_details/$course->id" ,2);
                $notify = Notification::where('to_user_id', $order->student_id)->orderBy('id', 'desc')->first();
                $user = User::find($order->student_id);
                try {
                    $MailNotification = new MailNotification($notify);
                    Mail::to($user->email)->send($MailNotification);
                } catch (\Throwable$th) {
                    return back()->with(['error' => 'تم تحديث البيانات بنجاح ولكن هناك خطاء في الاتصال بالانترنت لم يتم ارسال الايميلات']);
                }
            }
            return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Throwable $error) {
            return back()->with(['error' => 'عذرا هناك خطا لم تتم تحديث البيانات']);
        }
    }
    public function continueFont()
    {
        return view('courses.continue-learing');
    }
    public function showAppendixes($courseId)
    {
        try {
            $appendixes = CourseAppendix::with('course')->where('course_id', $courseId)->get();
            $course = Courses::where('id', $courseId)->with("trainer", "topic")->first();
            $studentCourse = StudentCourse::with('lessonData')->where('course_id', $courseId)->where('student_id', Auth::id())->first();
            $lessonId = StudentCourse::where('student_id', Auth::user()->id)->where('course_id', $courseId)->first()->lesson;
            $lesson = Lesson::where('is_active',1)->find($lessonId);
            $course = Courses::with("topic")->find($courseId);
            return view('courses.resoucers-courses')->with([
                'appendixes' => $appendixes,
                'course' => $course,
                'studentCourse' => $studentCourse,
                'lesson'=>$lesson
            ]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
        }
    }

    public function downloadAppendix($filePath)
    {
        try {
            return Download::downloadFile("/images/courses/appendixes/", $filePath);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
        }
    }

}
