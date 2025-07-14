<?php

namespace App\Models;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'body_ar',
        'body_en',
    ];
    // public function getImageAttribute($value){
    //     return url("images/posts/")."/".$value;
    // }
    public function postImage()
    {
        return $this->hasMany(PostImage::class);
    }

    public function like()
    {
        return $this->hasMany(PostLike::class,'post_id');
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class,'category_id');
    }

}
