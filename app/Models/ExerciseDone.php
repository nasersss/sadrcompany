<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseDone extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(User::class);
    }
    public function exercise()
    {
        return $this->belongsTo(Exercise::class,'exercise_id');
    }
    
}
