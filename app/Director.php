<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    protected $fillable  = [
        'name',
        'bio'
    ];

    /**
     * Get all of the films for the director.
     */
    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
