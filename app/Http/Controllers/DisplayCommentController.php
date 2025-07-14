<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisplayCommentRequest;
use App\Http\Requests\UpdateDisplayCommentRequest;
use App\Models\DisplayComment;

class DisplayCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $comments = DisplayComment::orderBy('id', 'desc')->get();
            return view('admin.displayComments.list')->with('comments', $comments);
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
        return view('admin.displayComments.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDisplayCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisplayCommentRequest $request)
    {
        try {
            $newComment = new DisplayComment;

            $newComment->name = $request->name;
            $newComment->title_ar = $request->title_ar;
            $newComment->title_en = $request->title_en;
            $newComment->comment_ar = $request->comment_ar;
            $newComment->comment_en = $request->comment_en;
            $newComment->star = $request->star;
            $newComment->is_active = $request->is_active;

            if ($newComment->save()) {
                return redirect()->route('list_display_comments')->with(['success' => 'تم اضافة التعليق  بنجاح']);
            }

            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة التعليق']);

        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة التعليق']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DisplayComment  $displayComment
     * @return \Illuminate\Http\Response
     */
    public function show(DisplayComment $displayComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DisplayComment  $displayComment
     * @return \Illuminate\Http\Response
     */
    public function edit(DisplayComment $displayComment, $commentId)
    {
        try {
            $comment = DisplayComment::find($commentId);
            return view('admin.displayComments.edit')->with('comment', $comment);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا هناك خطاء في جلب التعليق']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisplayCommentRequest  $request
     * @param  \App\Models\DisplayComment  $displayComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisplayCommentRequest $request, DisplayComment $displayComment, $commentId)
    {
        try {
            $comment = DisplayComment::find($commentId);
            $comment->name = $request->name;
            $comment->title_ar = $request->title_ar;
            $comment->title_en = $request->title_en;
            $comment->comment_ar = $request->comment_ar;
            $comment->comment_en = $request->comment_en;
            $comment->star = $request->star;

            if ($comment->update()) {
                return redirect()->route('list_display_comments')->with(['success' => 'تم تحديث  التعليق  بنجاح']);
            }

            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث  التعليق']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث  التعليق']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DisplayComment  $displayComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisplayComment $displayComment)
    {
        //
    }

    /**
     * Activation the commment or not
     *
     * @param mixed $commentId
     *
     * @return [type]
     *
     */
    public function active($commentId)
    {
        try {
            $comment = DisplayComment::find($commentId);
            $comment->is_active *= -1;
            if ($comment->save()) {
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
            }

            return back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث البيانات']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث البيانات البيانات']);
        }
    }

    public function delete($id)
    {
        try{
        $comment = DisplayComment::find($id);
        if ($comment->delete()) {
            return back()->with(['success' => 'تم الحذف  بنجاح']);
        }
        return back()->with(['error' => 'عذرا لم يتم الحذف  ']);

} catch (\Throwable$error) {
    return back()->with(['error' => 'عذرا لم يتم الحذف  ']);
}

    }
}
