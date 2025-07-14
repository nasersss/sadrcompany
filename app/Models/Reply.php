<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;


    public function replier()
    {
        return $this->belongsTo(User::class,'replier_id');
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_id');
    }
}
