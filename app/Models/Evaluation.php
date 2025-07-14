<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }

    

}
