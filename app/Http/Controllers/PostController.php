<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostImage;
use App\Models\PostLike;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $posts = Post::with(["postImage", "like", "category"])->orderBy('id', 'desc')->get();
            return view('admin.post.list')->with('posts', $posts);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب المقالات']);
        }
    }

    public function searching(Request $request)
    {
        try {
            $posts = Post::with(["postImage", "like", "category"])
                ->where('is_active', 1)
                ->where('title_en', 'like', '%' . $request->data . '%')
                ->orWhere('title_en', 'like', '%' . $request->data . '%')
                ->orWhere('title_ar', 'like', '%' . $request->data . '%')
                ->orWhere('body_en', 'like', '%' . $request->data . '%')
                ->orWhere('body_ar', 'like', '%' . $request->data . '%')
                ->orderBy('id', 'desc')
                ->paginate(3);

            $postCategories = PostCategory::with('post')->where('is_active', 1)->get();
            return view('posts.posts')->with(['posts' => $posts, 'postCategories' => $postCategories]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب المقالات']);
        }
    }
    public function listPosts()
    {
        try {
            $posts = Post::with(["postImage", "like", "category"])->orderBy('id', 'desc')->paginate(3);
            $postCategories = PostCategory::with('post')->where('is_active', 1)->get();
            if (!count($posts) > 0) {
                return redirect()->route('index')->with(['error' => __('message.error')]);
            }
            return view('posts.posts')->with(['posts' => $posts, 'postCategories' => $postCategories]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب المقالات']);
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
            $postCategories = PostCategory::where('is_active', 1)->get();
            return view('admin.post.add')->with('postCategories', $postCategories);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا ']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try {
            $post = new Post();
            $post->category_id = $request->categoryId;
            $post->title_ar = $request->title_ar;
            $post->title_en = $request->title_en;
            $post->body_ar = $request->body_ar;
            $post->body_en = $request->body_en;
            $post->is_active = -1;
            if ($post->save()) {
                $postMaineImage = new PostImage();
                $postMaineImage->image = $this->uploadMainFile($request->file('mainImage'), $post->id);
                $postMaineImage->is_active = -1;
                $postMaineImage->post_id = $post->id;
                $postMaineImage->save();
                foreach ($request->file('images') as $image) {
                    $postImage = new PostImage();
                    $postImage->image = Upload::file($image, '/images/posts');
                    $postImage->is_active = -1;
                    $postImage->post_id = $post->id;
                    $postImage->save();
                }
                return redirect()->route('list_posts')->with(['success' => 'تمت اضافة المقال  بنجاح ']);
            }
            return redirect()->route('list_posts')->with(['error' => 'عذرا هناك خطاء لم تتم إضافة المقال ']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم حفظ البيانات ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $id)
    {
        try {
            $inquiryController = new InquiryController();
            $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
            $posts = Post::orderBy('id', 'desc')->where('is_active', 1)->get();
            $singlePost = Post::with(["postImage", "like", "category"])->find($id);
            $postCategories = PostCategory::with('post')->where('is_active', 1)->get();
            if (!$pageWasRefreshed) {
                $singlePost->views += 1;
                $singlePost->update();
            }
            $singlePost->body_en = $inquiryController->textFilter($singlePost->body_en);
            $singlePost->body_ar = $inquiryController->textFilter($singlePost->body_ar);
            return view('posts.post')->with([
                'singlePost' => $singlePost,
                'posts' => $posts,
                'postCategories' => $postCategories,
            ]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم جلب البيانات ']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postCategories = PostCategory::where('is_active', 1)->get();

        return view('admin.post.edit')->with(['post' => $post, 'postCategories' => $postCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post, $postId)
    {
        $postInfo = Post::find($postId);
        $postInfo->category_id = $request->categoryId;
        $postInfo->title_en = $request->title_en;
        $postInfo->title_ar = $request->title_ar;
        $postInfo->body_en = $request->body_en;
        $postInfo->body_ar = $request->body_ar;

        if ($postInfo->update()) {
            try {

                $postMainImage = PostImage::where('image', 'like', $postId . '_' . 'main' . '_' . '%')->first();
                if ($request->hasFile('mainImage')) {
                    if ($postMainImage != null) {
                        if (File::exists('images/posts/' . $postMainImage->image)) {
                            File::delete('images/posts/' . $postMainImage->image);
                        }
                        $postMainImage->image = $this->uploadMainFile($request->file('mainImage'), $postId);
                        $postMainImage->update();
                    } else {
                        $postMainImage = new PostImage();
                        $postMainImage->image = $this->uploadMainFile($request->file('mainImage'), $postId);
                        $postMainImage->post_id = $postId;
                        $postMainImage->save();
                    }
                }
                if ($request->hasFile('images')) {

                    foreach ($request->file('images') as $image) {
                        $postImage = new PostImage();
                        $postImage->image = Upload::file($image, '/images/posts');
                        $postImage->is_active = -1;
                        $postImage->post_id = $postInfo->id;
                        $postImage->save();
                    }
                }
            } catch (\Throwable$error) {
                return redirect()->route('list_posts')->with(['error' => 'عذرا هناك خطا في الصور  ']);
            }
            return redirect()->route('list_posts')->with(['success' => ' تم تحديث البيانات بنجاح']);
        }
        return redirect()->route('list_posts')->with(['error' => 'عذرا هناك خطا في الصور']);
    }

    /**
     * [Description for saveLike]
     *
     * @param Request $request
     * @param mixed $postId=null
     *
     * @return [bool]
     *
     */
    public function saveLike(Request $request, $postId = null)
    {
        try {
            if ($postId == null) {
                $postId = $request->id;
            }

            $postLike = PostLike::where('post_id', $postId)->where('user_id', Auth::id())->first();
            if (!isset($postLike)) {
                $addPostLike = new PostLike();
                $addPostLike->post_id = $postId;
                $addPostLike->user_id = Auth::id();
                $addPostLike->like = 1;
                $addPostLike->save();
                if (!$request->json_true) {
                    return redirect()->route('show_post', $postId)->with(['success' => 'تم تسجيل اعجابك ,شكرا لك']);
                }

                return response()->json([
                    'bool' => true,
                ]);
            } else {
                if (!$request->json_true) {
                    return redirect()->route('show_post', $postId);
                }

                return response()->json([
                    'bool' => false,
                ]);
            }
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم حفظ البيانات ']);
        }
    }

    public function uploadMainFile($file, $id)
    {
        try {

            $destination = public_path() . "/images/posts";
            $fileName = $id . "_" . "main" . "_" . $file->getClientOriginalName();
            $file->move($destination, $fileName);
            return $fileName;
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => ' عذرا هناك خطا لم تتم رفع الصور بنجاح']);
        }
    }

    public function reviewImage($postId)
    {
        try {
            $post = Post::find($postId);
            $postImage = $post->postImage;
            return view('admin.post.review_image')->with('postImage', $postImage);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
        }
    }
    public function updateImage($postId)
    {
        # code...
    }
    /**
     * @param mixed $postId
     *This function delete images if user inter any images that not related of his auction
     * @return [rout with message]
     */
    public function deleteImage($postId)
    {
        try {
            $postImage = PostImage::find($postId);
            File::delete('images/posts/' . $postImage->image);
            if ($postImage->delete()) {
                return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
            } else {
                return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم حذف البيانات']);
            }
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم حدف الصور بنجاح']);
        }
    }

    public function delete($id)
    {
        try{
        $post = Post::with('postImage')->find($id);
        foreach ($post->postImage as $image) {
            if (File::exists('images/posts/' . $image->image)) {
                File::delete('images/posts/' . $image->image);
                $image->delete();
            }
            else{ return back()->with(['error' => 'عذرا لايوجد ملف بهذا الاسم']);}
        }
        $post->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

    } catch (\Throwable$error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم حدف الصور بنجاح']);
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
    public function toggle($postId)
    {
        try {
            $post = Post::find($postId);
            $post->is_active *= -1;
            if ($post->update()) {
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
            }

            return back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث البيانات']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث البيانات البيانات']);
        }
    }
}
