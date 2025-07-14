<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainerInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'trainer_id',
        'description',

    ];
    public function user()
    {
        return $this->belongsTo(User::class,'trainer_id');
    }

    public function course()
    {
        return $this->hasMany(Courses::class,'trainer_info_id');
    }
}
