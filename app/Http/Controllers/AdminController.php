<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\TrainerInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is.trainer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $trainerInfoId = TrainerInfo::where('trainer_id',Auth::id())->first()->id;
            $courses=Courses::with(['trainer','studentCourse'])->where('trainer_info_id',$trainerInfoId)->where('is_active',1)->get();
            $trainer=User::find($courses[0]->trainer->trainer_id);

            return view('trainer.home')->with([
                'trainer'=>$trainer,
                'courses'=>$courses
            ]);
        } catch (\Exception $e) {
            return view('trainer.home')->with(['error'=>'عذرا']);
        }
    }
}
