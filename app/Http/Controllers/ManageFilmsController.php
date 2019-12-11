<?php

namespace App\Http\Controllers;

use App\Film;
use App\Director;
use App\Genre;
use Gate;
use Illuminate\Http\Request;

class ManageFilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('users')){
            return redirect()->route('welcome');
        }

       return view('ManageFilms.index')
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
            return redirect()->route('welcome');
        }

        return view('ManageFilms.create')
            ->withAllDirectors(Director::all())
            ->withAllGenres(Genre::all());
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
            return redirect()->route('welcome');
        }

        request()->validate([
            'title'         => 'required',
            'director_id'   => 'required',
            'imgsrc'        => 'required| image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'running_time'  => 'required',
            'release_date'  => 'required',
            'budget'        => 'required',
            'plot'          => 'required'
        ]);

        $imageName = time().'.'.$request->imgsrc->extension();
        $request->imgsrc->move(public_path('uploads'), $imageName);

        $film = Film::create([
            'title'         => request('title'),
            'director_id'   => request('director_id'),
            'imgsrc'        => $imageName,
            'running_time'  => request('running_time'),
            'release_date'  => request('release_date'),
            'budget'        => request('budget'),
            'plot'          => request('plot')
        ]);

        $film->genres()->sync(request('genres'));

        return redirect('/manage-films');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Film $film)
    {
       if(Gate::denies('manage-all')){
            return redirect()->route('welcome');
        }

        return view('ManageFilms.show')->withFilm($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('welcome');
        }

        return view('ManageFilms.edit')
            ->withFilm($film)
            ->withAllDirectors(Director::all())
            ->withAllGenres(Genre::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('welcome');
        }

        request()->validate([
            'title'         => 'required',
            'director_id'   => 'required',
            'imgsrc'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'running_time'  => 'required',
            'release_date'  => 'required',
            'budget'        => 'required',
            'plot'          => 'required'
        ]);

        $imageName='';

        if(request()->imgsrc){
            $imageName = time().'.'.$request->imgsrc->extension();
            $request->imgsrc->move(public_path('uploads'), $imageName);
        }

        $film->update([
            'title'         => request('title'),
            'director_id'   => request('director_id'),
            'imgsrc'        => $imageName ? $imageName : $film->imgsrc,
            'running_time'  => request('running_time'),
            'release_date'  => request('release_date'),
            'budget'        => request('budget'),
            'plot'          => request('plot')
        ]);

        $film->genres()->sync(request('genres'));

        return redirect('/manage-films');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        if(Gate::denies('manage-all')){
            return redirect()->route('welcome');
        }

       $film->delete();
       $film->genres()->sync(request('genres'));

       return redirect('/manage-films');
    }
}
