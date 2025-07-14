<?php
namespace App\Upload;

class Upload
{

    public static function file($file,$dir)
    {
        try {
            $destination = public_path() . $dir;//"/files/lesson";
            $fileName = rand(10000, 100000) . "_" . time() . "_" . $file->getClientOriginalName();
            $file->move($destination, $fileName);
            return $fileName;
        } catch (\Throwable $error) {
            //getMessage function show error message if it found error
            return null;
            // return redirect()->back()->with(['error' => ' عذرا هناك خطا لم تتم رفع الصورة بنجاح']);
        }
    }
}
