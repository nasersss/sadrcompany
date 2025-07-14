<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Work;
use App\Models\Courses;
use App\Models\StudentCourse;
use App\Models\UserComment;
use App\Models\Visitor;

class SuperAdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is.super.admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $users = User::count();
        $courses = Courses::count();
        $works = Work::count();
        $posts = Post::count();
        $students = StudentCourse::count();
        $userComments = UserComment::count();
        $visitors = Visitor::count();
        $trainers = User::Train()->get()->count();
        $students = User::Student()->get()->count();

        try {
            return view('admin.home')->with([
                'users' => $users,
                'courses' => $courses,
                'works' => $works,
                'posts' => $posts,
                'students' => $students,
                'userComments' => $userComments,
                'visitors'=>$visitors,
                'trainers'=>$trainers,

            ]);
        } catch (\Exception $e) {
            return view('error.error');
        }
    }

    public function courseReview()
    {
        $courses = Courses::with(['trainer', 'studentCourse'])->get();

        return view('admin.course.courses-student-review')->with('courses', $courses);
    }
}
