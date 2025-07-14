<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonAppendix extends Model
{
    use HasFactory;

    public function getFileAttribute($value){
        return url("files/lesson/")."/".$value;
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
}
