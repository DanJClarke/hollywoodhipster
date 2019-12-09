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
        return  Film::with(['director','genres'])->get();
    }
}
