<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = [
        'name',
        'tag',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function lessons()
    {
        return $this->hasMany('App\Document')->where('category','lesson')->orderBy('filename');
    }

    public function annexes(){
        return $this->hasMany('App\Document')->where('category','annexe')->orderBy('filename');
    }

    public function exercises(){
        return $this->hasMany('App\Document')->where('category','exercise')->orderBy('filename');
    }
}
