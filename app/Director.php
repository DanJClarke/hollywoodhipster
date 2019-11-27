<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    public function film(){
        return $this->hasMany(Film::class);
    }
}
