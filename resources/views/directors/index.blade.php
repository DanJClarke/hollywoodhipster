@extends('layout')

@section('title', 'All films and Directors')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>Directors</h1>
            <ul>
                @foreach($allDirectors as $director)
                    <li><a href="/directors/{{ $director->id }}">{{ $director->name }}</a></li>
                @endforeach
            </ul>
            <a href="/directors/create">Add a Director &raquo;</a>
            <br/>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <h1>Films</h1>
            <ul>
                @foreach($allFilms as $film)
                    <li><a href="/films/{{ $film->id }}">{{ $film->title }}</a></li>
                @endforeach
            </ul>

            <a href="/films/create">Add a Film &raquo;</a>
            <br/>
        </div>
    </div>
@endsection
