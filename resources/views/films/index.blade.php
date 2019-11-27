@extends('layout')

@section('title', 'welcome')

@section('content')

    <div>
        <h1>Films</h1>
    </div>
    <div>
        <ul>
        @foreach($films as $film)
            <li>{{ $film->title }}</li>
        @endforeach
        <ul>

    </div>

@endsection
