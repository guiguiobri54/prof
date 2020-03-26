<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomSubscription extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'classroom_id',
        'message',

    ];

    public function classrooms()
    {
        return $this->belongsTo('App\Classroom');
    }
}
