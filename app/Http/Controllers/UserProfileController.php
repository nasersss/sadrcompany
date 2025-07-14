<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Upload\Upload;
use App\Models\Courses;
use App\Models\UserProfile;
use Illuminate\Http\Request;

use App\Models\StudentCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function userDashboard()
    {

        // try{
         $courses = StudentCourse::with(["student", "course"])->where('student_id',Auth::id())->where('is_active',1)->get();
        // return $courses[0]->course->trainer;
        return view('admin.dash-user-home')->with('courses',$courses);
    // } catch (\Throwable$th) {
    //     return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
    // }
    }

    public function subscribedCourses()
    {
        try{
        $courses = StudentCourse::with(["student", "course"])->where('student_id',Auth::id())->where('is_active',1)->get()->map(function ($item) {
            $item = Courses::with('trainer')->find($item->course->id);
            return $item;
        })->unique();
        return view('user.course.subscribed')->with('courses',$courses);
    } catch (\Throwable$th) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
    }
    }

    public function completedCourses()
    {
        try{
         $courses = StudentCourse::with(["student", "course"])->where('student_id',Auth::id())->where('is_active',1)->get()->where('is_completed',1)->map(function ($item) {
            $item = Courses::with(['studentCourse','trainer'])->find($item->course->id);
            return $item;
        })->unique();
        return view('user.course.completed')->with('courses',$courses);
    } catch (\Throwable$th) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات ']);
    }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {

            $user = User::with('profile')->get();
            return view('user.profile')
                ->with('users', $user);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'حصل خطاء غير متوقع ']);
        }
    }

    /**
     * list listUser function used to display all users
     */
    public function listUser()
    {
        try {
            $user = User::with('profile')->where('role', '!=', '0')->get();
            return view('admin.users.view_users')
                ->with('users', $user);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'حصل خطاء غير متوقع ']);
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
            $userInfo = User::find(Auth::user()->id);
            return view('admin.profile.add_profile')
                ->with('userInfo', $userInfo);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك    خطاء غير متوقع  ']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = StudentCourse::where('student_id',Auth::id())->first();
        if($student!=null)
           {
            Validator::validate($request->all(), [
                'ArFullName' => ['required', 'min:10', 'max:50'],
                'EnFullName' => ['required', 'min:10', 'max:50'],
                'gender' => ['required'],

            ], [
                'ArFullName.required' => 'يرجى كتابة الاسم العربي كامل ',
                'ArFullName.max' => 'لايمكنك ادخال اقل من 50 حرف',
                'ArFullName.min' => 'يجب ان يكون الحقل المدخل اكثر من حرف عشرة حروف',

                'EnFullName.required' =>  'يرجى كتابة الاسم الأنجليزي كامل ',
                'EnFullName.max' => 'لايمكنك ادخال اقل من 50 حرف',
                'EnFullName.min' => 'يجب ان يكون الحقل المدخل اكثر من حرف عشرة حروف',

                'gender.required' => 'يجب اخيار هذا الحقل'
            ]);
           }

        // try {


            $userProfile = Auth::id();
            $user = User::find($userProfile);
            $user->name = $request->name;
            $user->save();

            $userInfo  = new UserProfile();
            $userInfo->id = $userProfile;
            $userInfo->gender = $request->gender;
            $userInfo->user_id = $userProfile;
            $userInfo->phone = $request->phone;
            $userInfo->address = $request->address;
            $userInfo->facebook = $request->facebook;
            $userInfo->twitter = $request->twitter;
            $userInfo->instagram = $request->instagram;
             $userInfo->ar_full_name = $request->ArFullName;
             $userInfo->en_full_name = $request->EnFullName;
            $userInfo->image = $request->hasFile('image') ? Upload::file($request->file('image'), '/images/users/') : "defaultImage.png";
            if ($userInfo->save())
                return redirect()->route('profile')->with(['success' => 'تم تحديث البيانات بنجاح']);
            return redirect()->back()->with(['error' => ' الرجاء التأكد من صحة بيانات الاسم ']);
        // } catch (\Throwable $error) {
        //     return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $user = User::with(['profile','trainer'])->where('id', Auth::user()->id)->get();
            return view('admin.profile.profile')
                ->with('users', $user);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        try {
            $userInfo = User::with('profile')->find(Auth::id());
            return view('admin.profile.edit_profile')
                ->with('userInfo', $userInfo);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       $student = StudentCourse::where('student_id',Auth::id())->first();
        if($student!=null)
           {
            Validator::validate($request->all(), [
                'ArFullName' => ['required', 'min:10', 'max:50'],
                'EnFullName' => ['required', 'min:10', 'max:50'],
                'gender' => ['required'],

            ], [
                'ArFullName.required' => 'يرجى كتابة الاسم العربي كامل ',
                'ArFullName.max' => 'لايمكنك ادخال اقل من 50 حرف',
                'ArFullName.min' => 'يجب ان يكون الحقل المدخل اكثر من حرف عشرة حروف',

                'EnFullName.required' =>  'يرجى كتابة الاسم الأنجليزي كامل ',
                'EnFullName.max' => 'لايمكنك ادخال اقل من 50 حرف',
                'EnFullName.min' => 'يجب ان يكون الحقل المدخل اكثر من حرف عشرة حروف',

                'gender.required' => 'يجب اخيار هذا الحقل'
            ]);
           }
        try {

            $userProfile = Auth::id();
            $user = User::find($userProfile);
            $user->name = $request->name;
            $user->update();
            $userInfo = UserProfile::where('user_id',$user->id)->first() ? UserProfile::where('user_id',$user->id)->first():new UserProfile();
            $userInfo->user_id =  $user->id;
            $userInfo->gender;
            $userInfo->gender = $request->gender;
            $userInfo->phone = $request->phone;
            $userInfo->address = $request->address;
            $userInfo->facebook = $request->facebook;
            $userInfo->twitter = $request->twitter;
            $userInfo->instagram = $request->instagram;
            $userInfo->ar_full_name = $request->ArFullName;
            $userInfo->en_full_name = $request->EnFullName;
            if ($request->image != null) {
                if (realpath($userInfo->image)) {
                    unlink(realpath($userInfo->image));
                }
            }
            if ($request->hasFile('image')) {
                if (realpath($userInfo->image)) {
                    unlink(realpath($userInfo->image));
                }
            }
            $userInfo->image = $request->hasFile('image') ? Upload::file($request->file('image'), '/images/users/') : "defaultImage.png";
            if ($userInfo->save())
                return redirect()->route('profile')->with(['success' => 'تم تحديث البيانات بنجاح']);
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //{
    }


    /**
     * @param mixed $userId
     *this function used for convert is active from 1 to -1
     * @return [type]
     */
    public function toggle($userId)
    {

        try {

            $users = User::with("profile")->find($userId); //find($PoliceId);
            $users->is_active *= -1;
            if ($users->save())
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);

            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * @param mixed $userId
     * this function used for display page that through inserted data
     * @return [type]
     */
    public function editUser($userId)
    {
        try {
            $user = User::find($userId);
            return view("admin.users.edit")->with("users", $user);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }


    /**
     * @param Request $request
     * @param mixed $userId
     *  this function used to update data from user table
     * @return [type]
     */
    public function updateUser(Request $request, $userId)
    {
        try {


            $users = User::find($userId);

            $users->role = $request->role;

            $users->is_active = $request->is_active;

            if ($users->save())
                return redirect()->route('list-user')->with(['success' => 'تم تحديث البيانات بنجاح']);

            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * @param mixed $file
     *this function used to upload user photo
     * @return [type]
     */
    public function uploadFile($file)
    {
        try {

            $destination = public_path() . "/images/users/";
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($destination, $fileName);
            return $fileName;
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    public function notActive()
    {
        return view("error.error")->with([
            'error_title' => __('message.error_not_active_title'),
            'error_body'=>__('message.error_not_active_body')
        ]);
    }
}
