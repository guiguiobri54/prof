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

    //liaison à l'utilisateur:
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //liaison aux fichiers:
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    //liaison aux categories de fichiers pour affichage:
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

    //liaison aux classes

    public function classrooms()
    {
        return $this->belongsToMany('App\Classroom');
    }
}
