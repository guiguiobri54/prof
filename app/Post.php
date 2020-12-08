<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'content',
        'classroom_id',


    ];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->where('parent_id', 0);
    }
}
