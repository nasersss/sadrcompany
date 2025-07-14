<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserComment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserCommentRequest;
use App\Http\Requests\UpdateUserCommentRequest;
use App\Http\Controllers\NotificationController;

class UserCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $comments = UserComment::orderBy('id', 'desc')->get();
        return view("admin.userComments.list")->with("comments", $comments);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم نستطيع استرجاع البيانات']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addComment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        try {
            $newComment = new UserComment();
            $newComment->name = $request->name;
            $newComment->comment = $request->comment;

            if($newComment->save())
                {
                $admins = User::where('role',0)->get();
                foreach ($admins as $admin) {
                    $notification = new NotificationController();
                    $notification->sendNotification($admin->id, 'تم اضافة تعليق  جديد', 'list_user_comment');
                }
                return redirect()->route('index')->with(["success" => __('message.success_comment')]);

            }
            else
                {
                    return redirect()->route('index')->with(['error' =>__('message.error_comment')]);
                }

        } catch (\Throwable $th) {
            return redirect()->route('index')->with(['error' => __('message.error_comment')]);
        }
    }

}
