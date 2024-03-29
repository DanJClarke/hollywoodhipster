@extends('layout')

@section('title', 'film details')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $film->title }}</h1>
            <a href="/films/{{ $film->id }}/edit">edit</a>
            <br/>
            <br/>
            <p>Directed by:
            <a href="/directors/{{ $film->director->id }}">{{ $film->director->name }}</a>
            <img src="{{ $film->imgsrc }}" alt="{{ $film->title }} poster" />
            <p>Running time: {{  $film->running_time }} </p>
            <p>Release date: {{  $film->release_date }} </p>
            <p>Budget: {{ $film->budget  }} </p>
            <p>Plot: {{ $film->plot  }} </p>
            <p>Genre:
            @foreach ($film->genres as $genre)
                <span> {{ $genre->name }} </span>
            @endforeach
            </p>
        </div>
    </div>

    @if($film->reviews->count())
    <div class="row">
        <h3>Reviews</h3>
        <div>
            @foreach ($film->reviews as $review)
                <form method="POST" action="/reviews/{{ $review->id }}">
                    @method('DELETE')
                    @csrf
                    {{ $review->content }}
                    <button class="button alert inline" type="submit">Remove Review</button>
                </label>
                </form>
            @endforeach

        <div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <a href="/films">&laquo; Back to all films</a>
        </div>
    </div>
    @endif
@endsection
