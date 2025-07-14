<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use App\Models\StudentWork;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentWorkController extends Controller
{

    public function index($courseId)
    {

        $studentWork = StudentWork::where('course_id', $courseId)->get();
        $students = StudentCourse::with('student')->where('course_id', $courseId)->get();
        return view("admin.works.student-work-list")
            ->with(['works' => $studentWork, 'students' => $students, 'courseId' => $courseId]);
    }
    /**
     * [Description for store]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function store(Request $request)
    {

        try {
            $studentWork = new StudentWork();
            $studentWork->student_id = $request->studentId;
            $studentWork->course_id = $request->courseId;
            if (!$request->hasFile('Image')) {
                return back()->with(['error' => 'يرجى رفع الصورة ']);
            }

            $studentWork->img_url = $request->hasFile('Image') ? Upload::file($request->file('Image'), '/files/student/works') : null;
            if ($studentWork->save()) {
                return redirect()->route('student_work_list', $studentWork->course_id)->with(['success' => 'تم إضافة العمل بنجاح']);
            }

            return back()->with(['error' => 'عذرا لم يتم حفظ العمل']);
        } catch (\Throwable$th) {
            return back()->with(['error' => ' عذرا لم يتم حفظ العمل يرجى مراجعة الدعم الفني']);
        }
    }
    /**
     * [Description for active]
     *
     * @param mixed $Id
     *
     * @return [type]
     *
     */
    public function active($Id)
    {
        try {
            $work = StudentWork::find($Id);
            $work->is_active *= -1;
            if ($work->save()) {
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
            }

            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable$error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    public function showStudentWork()
    {
        try {
            $works = StudentWork::where('is_active', 1)->get();
            return view('courses.student-photo-gallery')->with('works', $works);
        } catch (\Throwable$th) {
            return back()->with(['error' => __('message.error')]);
        }

    }
    public function delete($id)
    {
        try {
            $work = StudentWork::find($id);
            if (File::exists('files/student/works/' . $work->img_url)) {
                File::delete('files/student/works/' . $work->img_url);
                if ($work->delete()) {
                    return back()->with(['success' => 'تم حذف الملف بنجاح']);
                }

                return back()->with(['error' => 'عذرا هناك خطاء لم يتم حذف العمل']);
            }
            return back()->with(['error' => 'عذرا لايوجد ملف بهذا الاسم']);
        } catch (\Throwable$th) {
            return back()->with(['error' => 'عذرا لم يتم حذف الملف']);
        }
    }
}
