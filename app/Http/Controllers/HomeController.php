<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\DisplayComment;
use App\Models\Post;
use App\Models\Setting;
use App\Models\StudentCourse;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\InquiryController;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        try {
         $works = $this->getWork();
        $comments = DisplayComment::orderBy('id', 'desc')->get();
        $posts = Post::with(['like', 'category'])->where('is_active', 1)->orderBy('id', 'desc')->paginate(2);
        $courses = Courses::with("trainer", "topic")->where('is_active', 1)->get()->map(function ($item) {
            $studentCourse = StudentCourse::where('student_id', Auth::id())->where('course_id', $item->id)->first();
            if (isset($studentCourse)) {
                $item->studentCourse = $studentCourse;
            } else {
                $item->studentCourse = null;
            }
            return $item;
        })->slice(0, 3);

        return view('index')
            ->with([
                'works' => $works,
                'comments' => $comments,
                'posts' => $posts,
                'courses' => $courses,
            ]);
        } catch (\Throwable $error) {
            return  view('error.error');
        }
    }

    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function works()
    {
        $works = Work::orderBy('id', 'desc')->get();

        return view('ourwork')->with('works', $works);
    }
    public function contact()
    {
        return view('contact');
    }

    /**
     * [Description for showCourseDetails]
     *
     * @return [type]
     *
     */
    public function showCourseDetails(Request $request, $courseId)
    {
        try {

            //$locationData = Location::get('188.209.226.108');
            //production
            $locationData = Location::get($request->ip());
              $countryCode =$locationData->countryCode;
            // $countryCode = "YE";

            $studentCourse = StudentCourse::where('student_id', Auth::id())->where('course_id', $courseId)->first();
            $course = Courses::where('id', $courseId)->with("trainer", "topic")->first();
            $settings = Setting::get();
            $inquiryController = new InquiryController();
            $course->description = $inquiryController->textFilter($course->description);
            $course->count;
            $course->trainer->description = $inquiryController->textFilter($course->trainer->description);
            if ($course->topic !== null) {
                $course->count = count($course->topic);
            }

            return view('courses.courseDetails')->with(['settings'=>$settings,'course' => $course, 'studentCourse' => $studentCourse, 'countryCode' => $countryCode]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم جلب البيانات']);
        }
    }
    /**
     * [Description for listCourses]
     *
     * @return [type]
     *
     */
    public function listCourses()
    {
        try {
            $courses = Courses::with("trainer")->where('is_active', 1)->get()->map(function ($item) {
                $studentCourse = StudentCourse::where('student_id', Auth::id())->where('course_id', $item->id)->first();
                if (isset($studentCourse)) {
                    // $item->is_in = "true";
                    $item->studentCourse = $studentCourse->id;
                } else {
                    $item->studentCourse = null;
                }
                return $item;
            });
            if (!count($courses) > 0) {
                return redirect()->route('index')->with(['error' => __('message.error')]);
            }

            return view('courses.list')->with('courses', $courses);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => __('message.error')]);
        }
    }

    public function getUser()
    {
        return User::all();
    }
    /**
     * [Description for getWork]
     *
     * @param mixed $works
     *
     * @return [array of object]
     *
     */
    private $countFirst = 0;
    private $countScend = 0;
    private $countThird = 0;
    private $countForth = 0;
    public function getWork()
    {
        $works = Work::orderBy('id', 'desc')->where('is_active',1)->get()->map(function ($item) {
            switch ($item->item_brand) {
                case 'first':
                    $this->countFirst++;
                    if ($this->countFirst <= 3) {
                        return $item;
                    }
                    break;

                case 'second':
                    $this->countScend++;
                    if ($this->countScend <= 3) {
                        return $item;
                    }
                    break;

                case 'third':
                    $this->countThird++;
                    if ($this->countThird <= 3) {
                        return $item;
                    }
                    break;

                case 'fourth':
                    $this->countForth++;
                    if ($this->countForth <= 3) {
                        return $item;
                    }
                    break;

                default:
                    break;
            }
        })->reject(function ($item) {
            return empty($item);
        });
        // $newWork=[''];
        //     $item_brand=['brand'=>['first','second','third','fourth']];
        //     switch ($item_brand[0]) {
        //         case 'first':
        //             for ($i=0; $i <3 ; $i++) {
        //                 array_push($newWork,$work);
        //             }
        //             break;
        //         case 'second':
        //             # code...
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }

        return $works;
    }
}
