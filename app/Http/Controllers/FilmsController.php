<?php

namespace App\Http\Controllers;

use App\Film;
use App\Director;
use App\Genre;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('films.index')
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

        return view('films.create')
            ->withAllDirectors(Director::all())
            ->withAllGenres(Genre::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $film = Film::create(request()->validate([
            'title' => ['required'],
            'director_id' => ['required'],
            'imgsrc' => ['required'],
            'running_time' => ['required'],
            'release_date' => ['required'],
            'budget' => ['required'],
            'plot' => ['required'],
        ]));

        $film->genres()->sync(request('genres'));

        return redirect('/films');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {

        return view('films.edit')
            ->withFilm($film)
            ->withAllDirectors(Director::all())
            ->withAllGenres(Genre::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {

        $film->update(request()->validate([
            'title' => ['required'],
            'director_id' => ['required'],
            'imgsrc' => ['required'],
            'running_time' => ['required'],
            'release_date' => ['required'],
            'budget' => ['required'],
            'plot' => ['required']
        ]));

        $film->genres()->sync(request('genres'));

        return redirect('/films');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
       $film->delete();
       $film->genres()->sync(request('genres'));

       return redirect('/films');
    }
}
