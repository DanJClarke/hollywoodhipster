<?php

namespace App\Http\Controllers;

use App\Film;
use App\Director;
use App\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFilms = Film::with(['director','genres','reviews'])->get();

        if($allFilms){
            return $allFilms;
        }
        return response()->json('No Films in the database!', 404);
    }
}
