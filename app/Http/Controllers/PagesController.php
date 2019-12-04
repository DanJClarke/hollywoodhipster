<?php

namespace App\Http\Controllers;
use App\Film;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('welcome')->withAllFilms(Film::all());;

    }

    public function foundation(){

    return view('foundation-test');

    }
}
