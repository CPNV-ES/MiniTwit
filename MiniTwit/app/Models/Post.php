<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use \Conner\Likeable\Likeable;

class Post extends Model
{
    use Likeable;

    protected $fillable = ['text'];

    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    public function user()
    {
        $test = $this->belongsTo(User::class);
        //dd($test);
        return $this->belongsTo(User::class);
    }
}
