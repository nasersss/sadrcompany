<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    /**
     * [Description for index]
     *
     * @return [type]
     *
     */
    public function index($courseId)
    {
        $users = User::with('profile')->get();
        try {
            $inquiries = Inquiry::with(['reply', 'student'])
                ->where('course_id', $courseId)
                ->where('is_active', 1)
                ->get()
                ->map(function ($item) {
                    $item->content_format = $this->textFilter($item->content);
                    $item->reply->map(function ($item) {
                        $item->content_format = $this->textFilter($item->content);
                        return $item;
                    });
                    return $item;
                });

            $myInquiries = Inquiry::with(['reply', 'student'])
                ->where('course_id', $courseId)
                ->where('is_active', 1)
                ->where('student_id', Auth::id())
                ->get()->map(function ($item) {
                $item->content_format = $this->textFilter($item->content);
                $item->reply->map(function ($item) {
                    $item->content_format = $this->textFilter($item->content);
                    return $item;
                });
                return $item;
            });
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب الاستفسارات']);
        }
        return view('courses.chat')
            ->with([
                'users' => $users,
                'inquiries' => $inquiries,
                'courseId' => $courseId,
                'myInquiries' => $myInquiries,
            ]);
    }

    public function textFilter($text)
    {
        $text = preg_split('/[\n\r]+/', $text);
        $i = 0;
        foreach ($text as $txt) {
            $temp = explode(' ', $txt);
            $text[$i] = $temp;
            $i++;
        }

        return $text;
    }

    /**
     * [Description for list]
     *
     * @return [type]
     *
     */
    function list() {
        try {
            $inquiries = Inquiry::with('reply')->get();
            return view('admin.lesson.list')->with(['inquiries' => $inquiries]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب الاستفسارات']);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request->content == null) {
                return back()->with(['error' => ' عذرا يرجى اضافة استفسارك ']);
            }

            $inquiry = new Inquiry();
            $inquiry->student_id = Auth::id();
            $inquiry->course_id = $request->courseId;
            $inquiry->content = $request->content;
            $inquiry->save();

            // notification
            $trainer = $inquiry->course->trainer->trainer_id;
            $course = $inquiry->course_id;
            NotificationController::sendNotification($trainer, Auth::user()->name . ' لديه استفسار جديد', "course-inquiries/$course");
            NotificationController::sendNotificationToAdmin(Auth::user()->name . ' لديه استفسار جديد', "course-inquiries/$course");

            return back()->with([
                'success' => 'تم اضافة استفسارك بنجاح',
            ]);
        } catch (\Throwable$th) {
            return back()->with([
                'error' => ' عذرا هناك خطأ',
            ]);
        }
    }

    /**
     * [Description for update]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function update(Request $request)
    {
        try {
            if ($request->content == null) {
                return back()->with(['error' => ' عذرا يرجى اضافة استفسارك ']);
            }

            $inquiry = Inquiry::with('reply')->find($request->inquiryId);
            if ($inquiry->student_id != Auth::id()) {
                return back()->with(['error' => 'عذرا لايمكنك التعديل على هذا الاستفسار ']);
            }

            if (count($inquiry->reply) != 0) {
                return back()->with(['error' => 'عذرا لايمكنك التعديل على هذا الاستفسار ']);
            }

            $inquiry->content = $request->content;
            if ($inquiry->update()) {
                return back()->with(['success' => 'تم تحديث استفسارك بنجاح']);
            }

            return back()->with(['error' => 'عذرا لم يتم تعديل الاستفسار']);
        } catch (\Throwable$th) {
            return back()->with(['error' => ' عذرا هناك خطاء لم يتم التعديل']);
        }

    }
    /**
     * [Description for deleteInquiry]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function deleteInquiry(Request $request)
    {

        try {
            $inquiry = Inquiry::find($request->inquiryId);
            if ($inquiry->delete()) {
                return back()->with(['success' => 'تم حذف استفسارك بنجاح']);
            }

            return back()->with(['error' => ' عذرا هناك خطاء لم يتم الحذف']);
        } catch (\Throwable$th) {
            return back()->with(['error' => ' عذرا هناك خطاء لم يتم الحذف']);
        }

    }
}
