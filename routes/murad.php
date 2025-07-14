<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/course/murad/{courseId}', [StudentCourseController::class, 'continueFont'])->name('continue_front');
// Route::get('/course/murad/resources/{courseId}', [StudentCourseController::class, 'showResources'])->name('show_resources');
Route::get('/chat/murad/', function () {
    return view('courses.chat');
})->name('courses.chat');

Route::get('/QR/code/', function () {
    return view('QR-code');
});
Route::get('/certification/murad/', function () {
    return view('courses.certification');
});
Route::get('/certification/murad/', function () {
    return view('courses.certification');
});
Route::get('/evaluation/murad/', function () {
    return view('courses.evaluation');
});
 Route::get('/com',function(){
    return view('courses.completed-course')->with('titleCourse', 'الفوتوشوف المعماري');

});

Route::get('/photo_gallery/murad/',function(){
    return view('courses.photo_gallery');

})


?>
