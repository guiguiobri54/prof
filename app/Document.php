<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'filename',
        'mime',
        'path',
        'size',
        'category',
        'study_id'
    ];

    public function study()
    {
        return $this->belongsTo('App\Study');
    }
}

