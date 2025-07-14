<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Upload\Upload;
use App\Models\Policies;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use Illuminate\Support\Facades\File;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try {
            $works = Work::orderBy('id','desc')->get();
            return view("admin.works.list")
                    ->with('works',$works);//change with to with("works",$works);
        } catch (\Throwable $error) {
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
        try {
            return view('admin.works.add');

        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا ']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        try {
            $newWorks = new Work();
            $request->hasFile('image');
             $newWorks->image = $request->hasFile('image') ? Upload::file($request->file('image'), '/images/works') : null;
            $newWorks->item_brand = $request->item_brand;
            $newWorks->description = $request->description;
            $newWorks->is_active = $request->is_active;
          
            if($newWorks->save())
                 return redirect()->route('list_works')->with(["success" => "تمت اضافة البيانات بنجاح "]);
         return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);

           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
       return $work; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work,$workId)
    {
        try {
            $work = Work::find($workId);//must be change to $work = Work::find($workid)
            return view('admin.works.edit')
                ->with('work', $work);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا خطاء في جلب بيانات العمل  ']);
        }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work,$workId)
    {
         $work = Work::find($workId);
       
        try {
            if ($request->hasFile('image')) {
                if (File::exists('images/works/' .  $work->image)) {
                    File::delete('images/works/' .  $work->image);
                }
                 $work->image = $request->hasFile('image') ? Upload::file($request->file('image'), '/images/works') : null;
            }
            $work->item_brand = $request->item_brand;
            $work->description = $request->description;
            $work->is_active = $request->is_active;
            if($work->save())
                 return redirect()->route('list_works')->with(["success" => "تمت تحديث البيانات  بنجاح "]);
         return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث  البيانات']);

           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم يتم تحديث  البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
    public function active($Id)
    {
        try {
            $work = Work::find($Id);
            $work->is_active *= -1;
            if ($work->save())
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);

            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    public function delete($id)
    {
        $work = Work::find($id);
        if (File::exists('images/works/' . $work->image)) {
            File::delete('images/works/' . $work->image);
            if( $work->delete())
            return back()->with(['success'=>'تم حذف الملف بنجاح']);
      return back()->with(['error'=>'عذرا هناك خطاء لم يتم حذف العمل']);
        }
        return back()->with(['error'=>'عذرا لايوجد ملف بهذا الاسم']);
    
    }
     /**
     * This function used to upload image and return file nam.
     *
     * @param mixed $file
     * @param mixed $id
     *
     * @return string $fileName
     *
     */
    public function uploadFile($file)
    {
        try {
            $destination = public_path() . "/images/works";
            $fileName =time() . "_" . $file->getClientOriginalName();
            $file->move($destination, $fileName);
            return $fileName;
        } catch (\Throwable$error) {
            /**
             * getMessage function show error message if it found error
             */
            return redirect()->back()->with(['error' => ' عذرا هناك خطا لم تتم رفع الصورة بنجاح']);
        }
    }
}
