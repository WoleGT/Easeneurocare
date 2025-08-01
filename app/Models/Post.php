<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'image_path'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
