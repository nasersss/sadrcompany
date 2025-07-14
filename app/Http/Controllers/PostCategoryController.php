<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\PostCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = PostCategory::with('post')->get()->map(function ($item) {
            $item->post = count($item->post);
            return $item;
        });
        return view('admin.post.category.list')->with('postCategories', $postCategories);
        // return $postCategories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        try {
            $postCategory = new PostCategory();
            $postCategory->ar_name = $request->ar_name;
            $postCategory->en_name = $request->en_name;
            $postCategory->save();
            return back()->with(['success' => 'تمت الاضافة بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم عملية الاضافة']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCategoryRequest  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request)
    {
        try {
            $postCategory = PostCategory::find($request->id);
            $postCategory->ar_name = $request->ar_name;
            $postCategory->en_name = $request->en_name;
            $postCategory->update();
            return back()->with(['success' => 'تمت التعديل بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم عملية التعديل']);
        }
    }

    /**
     * [Description for toggle]
     *
     * @param mixed $postId
     *
     * @return [type]
     *
     */
    public function toggle($postCategoryId)
    {
        try {
            $postCategory = PostCategory::find($postCategoryId);
            $postCategory->is_active *= -1;
            $postCategory->update();
            return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث  البيانات']);
        }
    }
    public function delete($id)
    {
        try{
        $Category = PostCategory::with('post')->find($id);
        $postController = new PostController();
        foreach ($Category->post as $post) {
            $postController->delete($post->id);
        }
        $Category->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم حذف الصنف  ']);
    }

    }
}
