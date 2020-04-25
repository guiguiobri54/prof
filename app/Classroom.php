<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'school',
        'user_id',
        'creator',

    ];

    //liaison à l'utilisateur
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //liaison aux cours
    public function studies()
    {
        return $this->belongsToMany('App\Study');
    }

    public function classroom_subscriptions()
    {
        return $this->hasMany('App\ClassroomSubscription');
    }

    public function attachedUsers()
    {
        return $this->belongsToMany('App\User');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
