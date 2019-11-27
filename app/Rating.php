<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
