<?php

namespace App\Http\Controllers;

use App\Film;
use App\Director;
use App\Genre;
use Gate;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('home');
        }

        return view('manageDirectors.index')
        ->withAllFilms(Film::all())
        ->withAllDirectors(Director::all())
        ->withAllGenres(Genre::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('home');
        }

        return view('manageDirectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('home');
        }

        Director::create(request()->validate([
            'name' => ['required'],
            'bio' => ['required']
        ]));

        return redirect('/manage-directors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Director  $manage_director
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Director $manage_director)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('home');
        }

        $genres = [];

        $manage_director->films->each(function($film) use (&$genres) {
            $film->genres->each(function($genre) use (&$genres) {
                $genres[] = $genre;
            });
        });

        return view('manageDirectors.show')
            ->withDirector($manage_director)
            ->withDirectorsGenres($genres);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Director  $manage_director
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $manage_director)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('home');
        }

        return view('manageDirectors.edit')
            ->withDirector($manage_director)
            ->withAllFilms(Film::all())
            ->withAllGenres(Genre::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Director  $$manage_director
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Director $manage_director)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('home');
        }

        $manage_director->update(request()->validate([
            'name' => ['required'],
            'bio' => ['required'],
        ]));

        return redirect('/manage-directors');
    }
}
