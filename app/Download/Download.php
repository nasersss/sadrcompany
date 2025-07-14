<?php
namespace App\Download;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class Download
{

    public static function downloadFile($dir,$filePath)
    {
        try{  
            $file = public_path().$dir.$filePath;
             $type = File::extension($file);
         
                $header = array(
                    'Content-Type: application/'.$type
                );
                return Response::download($file,"lesson_exercise.$type",$header);
               
         }
        catch(\Throwable $the){
            return back()->with(['error'=>'عذرا لم نستطيع  تحميل قد يكون الملف محذوف ']);
        }
    }
}
