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
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function studies()
    {
        return $this->hasMany('App\Study');
    }
}
