<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TrainerInfo;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreTrainerInfoRequest;
use App\Http\Requests\UpdateTrainerInfoRequest;
use App\Models\Courses;
use App\Models\StudentCourse;

class TrainerInfoController extends  Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
             $users =  User::Train()->with("trainer")->orderBy('id','desc')->get();
            return view('admin.trainer.list')->with('users',$users);
        } catch (\Throwable $th) {
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات  ']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $users = User::Train()->get();
            return view('admin.trainer.add')->with('users',$users);
        } catch (\Throwable $th) {
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات  ']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrainerInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerInfoRequest $request)
    {
        try {
            $trainer = new TrainerInfo();
            $trainer->trainer_id =  $request->trainerId ;
            $trainer->description = $request->description;
            if($trainer->save())
                return redirect()->route('trainers_list')->with(['success' => 'تمت إضافة بيانات المدرب بنجاح']);
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم إضافة البيانات  ']);

        } catch (\Throwable $th) {
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم إضافة البيانات  ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainerInfo  $trainerInfo
     * @return \Illuminate\Http\Response
     */
    public function show($trainerInfoId)
    {
        try{
            $courses=Courses::with(['trainer','studentCourse'])->where('trainer_info_id',$trainerInfoId)->get();
            $trainer=User::find($courses[0]->trainer->trainer_id);
           
            return view('admin.trainer.show')->with([
                'trainer'=>$trainer,
                'courses'=>$courses
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات  ']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainerInfo  $trainerInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($trainerId)
    {
        // $trainerId =$id;
        try {
            $users =  User::Train()->with("trainer")->orderBy('id','desc')->get();
            $trainerInfo = TrainerInfo::with("user")->find($trainerId);
            return view('admin.trainer.update')->with(['users'=>$users,'trainerInfo'=>$trainerInfo]);
        } catch (\Throwable $th) {
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم جلب البيانات  ']);
        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainerInfoRequest  $request
     * @param  \App\Models\TrainerInfo  $trainerInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainerInfoRequest $request)
    {
        try{
            $trainer =TrainerInfo::find($request->id);
            $trainer->trainer_id = $request->trainerId ;
            $trainer->description = $request->description;
            $trainer->update();
            return redirect()->route('trainers_list')->with(['success' => 'تمت تحديث بيانات المدرب بنجاح']);
        }catch(\Throwable $th){
            return redirect()->route('trainers_list')->with(['error' => 'عذرا هناك خطا لم يتم تحديث البيانات']);
        }
    }


}
