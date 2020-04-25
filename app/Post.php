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
}
