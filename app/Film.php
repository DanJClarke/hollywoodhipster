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

    /**
     * Get all of the reviews for the film.
     */
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    /**
    * The genres that belong to the film.
    */
    public function genres(){
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }

    /**
    * The director who belongs to the film.
    */
    public function director(){
        return $this->belongsTo(Director::class);
    }
}
