<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function getFileAttribute($value){
        return url("files/lesson/")."/".$value;
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class,'topic_id');
    }

    public function exercise()
    {
        return $this->hasMany(Exercise::class,'lesson_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function scopeByTopic($query,$topicId)
    {
        return $query->where('topic_id',$topicId);
    }
}
