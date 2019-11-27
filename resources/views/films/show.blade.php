@extends('layout')

@section('title', 'Edit film details')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $film->title }}</h1>

            <img src="{{ $film->imgsrc }}" alt="{{ $film->title }} poster" />
            <p>Running time: {{  $film->running_time }}</p>
            <p>Release date:{{  $film->release_date }}</p>
            <p>Budget: {{ $film->budget  }}</p>
            <p>Plot: {{ $film->plot  }}</p>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <a href="/films/{{ $film->id }}/edit">edit</a>
        </div>
    </div>

@endsection
