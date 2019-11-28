<?php

namespace App;

use App\Review;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable  = [
        'title',
        'director_id',
        'imgsrc',
        'running_time',
        'release_date',
        'budget',
        'plot'
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function genre(){
        return $this->belongsToMany(Genre::class);
    }

    public function director(){
        return $this->belongsTo(Director::class);
    }
}
