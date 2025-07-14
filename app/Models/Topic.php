<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->belongsTo(Courses::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class,'topic_id');
    }
}
