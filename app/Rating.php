<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable  = [
        'rating', 'film_id', 'user_id'
    ];

    /**
    * Get the film thats associated with the Rating.
    */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
    * Get the user that owns the Rating.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

