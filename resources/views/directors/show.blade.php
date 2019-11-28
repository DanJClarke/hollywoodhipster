@extends('layout')

@section('title', 'Edit film details')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $director->name }}</h1>
            <a href="/directors/{{ $director->id }}/edit">edit</a>
            <br/>
            <br/>
            <p>Bio: <br/>{{ $director->bio }}</p>
            <p>Films:</p>
            <ul>
            @foreach($director->films as $film)
                <li><a href="/films/{{ $film->id }}">{{ $film->title }}</a></li>
            @endforeach
            </ul>

            <p>Genres they are known for:</p>
            <ul>
                @foreach($directorsGenres as $genre)
                    <li>{{ $genre->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
