<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable  = [
        'rating', 'film_id', 'user_id'
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
