<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'imgsrc',
        'running_time',
        'release_date',
        'budget',
        'plot'
    ];
}
