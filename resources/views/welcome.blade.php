@extends('layouts.app')

    @section('title', 'welcome')

    @section('content')

    <div class="content">
        <div class="title m-b-md">
            Movies
        </div>
        <div class="row">
           @foreach($allFilms as $film)
            <div class="small-12 medium-6 large-3 columns flex film-card" style="padding: 10px;">
                <div style="background: grey;">
                    <img src="/uploads/{{ $film->imgsrc }}" alt="{{ $film->name }} poster"/>
                    <h2>{{ $film->title }}</h2>
                    <ul>
                        <li>{{ date('Y', strtotime($film->release_date)) }}</li>
                        <li>

                        </li>
                    </ul>
                </div>
            </div>
           @endforeach
        </div>
    </div>

    @endsection
