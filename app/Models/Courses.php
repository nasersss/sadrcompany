<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    public function getImageAttribute($value){
        return url("images/courses/main")."/".$value;
    }

    public function trainer()
    {
        return $this->belongsTo(TrainerInfo::class,'trainer_info_id');
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class,'diploma_id');
    }

    public function topic()
    {
        return $this->hasMany(Topic::class,'courses_id');

    }

    public function studentCourse(){

        return $this->hasMany(StudentCourse::class,'course_id');

    }

    public function inquiry(){

        return $this->hasMany(Inquiry::class,'course_id');

    }

    public function courseAppendix(){

        return $this->hasMany(CourseAppendix::class,'course_id');

    }
    public function work(){
        return $this->hasMany(StudentWork::class,'course_id');
    }
    public function evaluation()
    {
        return $this->hasMany(Evaluation::class,'course_id');
    }
    // public function file()
    // {
    //     return $this->hasMany(CourseAppendixes::class,'course_id');
    // }
}
