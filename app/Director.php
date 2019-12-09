<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    protected $fillable  = [
        'name',
        'bio'
    ];

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
