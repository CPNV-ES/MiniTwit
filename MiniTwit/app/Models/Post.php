<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['text'];

    protected $casts = [
        'likes' => User::class,
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
