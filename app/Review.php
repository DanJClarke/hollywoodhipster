<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable  = [
        'content','film_id', 'user_id'
    ];

    /**
    * Get the film thats associated with the Review.
    */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
    * Get the user that owns the Review.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
