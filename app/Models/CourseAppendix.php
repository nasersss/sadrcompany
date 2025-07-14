<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAppendix extends Model
{
    use HasFactory;

    public function getImageAttribute($value){
        return url("images/courses/appendixes")."/".$value;
    }

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
}
