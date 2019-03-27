<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = [
        'name',
        'classroom_id',
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function lessons(){
        return $this->hasMany('App\Document')->where('category','lesson')->orderBy('filename');
    }
}
