@extends('layout')

@section('title', 'welcome')

@section('content')

    <div>
        <h1>Films</h1>
    </div>
    <div>
        <ul>
        @foreach($allFilms as $film)
            <li><a href="/films/{{ $film->id }}">{{ $film->title }}</a></li>
        @endforeach
        <ul>

    </div>

        <div>
            <h1>Directors</h1>
        </div>
        <div>
            <ul>
            @foreach($allDirectors as $director)
                <li><a href="/directors/{{ $director->id }}">{{ $director->name }}</a></li>
            @endforeach
            <ul>

        </div>

@endsection
