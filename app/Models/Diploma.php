<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->hasMany(Courses::class,'diploma_id');
    }
}
