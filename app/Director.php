<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    protected $fillable  = [
        'name',
        'bio'
    ];

    protected $appends = [
        'genres'
    ];

    /**
     * Get all of the films for the director.
     */
    public function films()
    {
        return $this->hasMany(Film::class);
    }

    public function getGenresAttribute()
    {
        $genres = [];
        $this->films->each(function($film) use (&$genres){
            $film->genres->pluck('name')->each(function($genre) use (&$genres) {
                $data = $genre;
                $genres[] = $data;
            });
        });
        return array_unique($genres);
    }

}
