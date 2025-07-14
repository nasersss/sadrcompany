<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        try {
            if($request->content==null)
            return back()->with(['error' => ' عذرا يرجى اضافة الرد الخاص بك ',]);
            $replies = new Reply();
            $replies->replier_id = Auth::id();
            $replies->inquiry_id = $request->inquiryId;
            $replies->content = $request->content;
            $replies->save();

            // notification
            $student =  $replies->inquiry->student_id;
            $course = $replies->inquiry->course_id;
            NotificationController::sendNotification($student, ' لقد تم الرد على استفسارك', "course-inquiries/$course");

            return back()->with([
                'success'=>'تم اضافة ردك بنجاح'
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                'error'=>'اووووه عذرا هناك خطأ'
            ]);
        }
        
       
    }
    public function deleteReply(Request $request)
    {
        try {
            $reply = Reply::find($request->replyId);
            if ($reply->delete()) {
                return back()->with(['success' => 'تم حذف الرد بنجاح']);
            }

            return back()->with(['error' => ' عذرا هناك خطأ']);
        } catch (\Throwable$th) {
            return back()->with(['error' => ' عذرا هناك خطأ']);
        }
    }

    public function update(Request $request)
    {
        try {
            if ($request->content == null) {
                return back()->with(['error' => ' عذرا يرجى اضافة الرد ']);
            }

             $reply = Reply::find($request->replyId);
            if ($reply->replier_id != Auth::id()) {
                return back()->with(['error' => 'عذرا لايمكنك التعديل على هذا الرد ']);
            }

            $reply->content = $request->content;
            if ($reply->update()) {
                return back()->with(['success' => 'تم تحديث الرد بنجاح']);
            }

            return back()->with(['error' => 'عذرا لم يتم تعديل الرد']);
        } catch (\Throwable$th) {
            return back()->with(['error' => ' عذرا هناك خطاء لم يتم التعديل']);
        }
    }
}
