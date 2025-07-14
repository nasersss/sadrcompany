<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'description'
    ];
    public function getFileAttribute($value){
        return url("files/exercises/")."/".$value;
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
    public function exerciseDone()
    {
        return $this->hasMany(ExerciseDone::class,'exercise_id');
    }
}
