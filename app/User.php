<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'gender', 'first_name', 'last_name', 'user_type', 'about_me', 'avatar', 'last_login_at', 'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->role == 4;
    }

    public function isHeadmaster(){
        return $this->role==3;
    }

    public function isTeacher(){
        return $this->role==2;
    }

    public function isStudent(){
        return $this->role==1;
    }

    public function isDefaultUser(){
        return $this->role==0;
    }

    public function classrooms()
    {
        return $this->hasMany('App\Classroom');
    }

    public function studies()
    {
        return $this->hasMany('App\Study');
    }

    public function attachedClassrooms()
    {
        return $this->belongsToMany('App\Classroom');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}

