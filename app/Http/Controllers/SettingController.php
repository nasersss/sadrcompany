<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        try{
        $settings = Setting::get();
        return view('admin.setting.list')->with('settings',$settings);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم   جلب البيانات']);
    }

    }
    public function update(Request $request)
    {
        try{
        $setting = Setting::find($request->settingId);
        $setting->value = $request->value;
        if($setting->update())
        return redirect()->back()->with(['success' => 'تم تحديث البيانات بنجاح']);
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم لم يتم تحديث البيانات']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم لم يتم تحديث البيانات']);
    }



    }
}
