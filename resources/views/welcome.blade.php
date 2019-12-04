@extends('layouts.app')

    @section('title', 'welcome')

    @section('content')


        <div class="content">
            <div class="title m-b-md">
                Movies
            </div>
            <div class="row">
               @foreach($tasks as $task)
                <div class="small-12 large-6 large-3 columns">
                    <img src="{{ $film->imgsrc }}" alt="{{ $film->name }} poster"/>
                    <h2>{{ $film->name }}</h2>
                    <ul>

                    </ul>
                </div>
               @endforeach
            </div>
        </div>
    @endsection
