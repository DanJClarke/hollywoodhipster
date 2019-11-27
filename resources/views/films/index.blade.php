@extends('layout')

@section('title', 'welcome')

@section('content')

    <div>
        <h1>Films</h1>
    </div>
    <div>
        <ul>
        @foreach($films as $film)
            <li><a href="/films/{{ $film->id }}">{{ $film->title }}</a></li>
        @endforeach
        <ul>

    </div>

@endsection
