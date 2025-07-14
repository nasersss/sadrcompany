<?php

namespace App\Models;

// use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostImage extends Model
{
    use HasFactory;

    // public function getImageAttribute($value){
    //     return url("images/posts/")."/".$value;
    // }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
