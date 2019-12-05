@extends('layouts.app')

@section('title', 'film details')

@section('content')

@foreach($myReviews as $review)
    <div class="row">
        <div class="large-12 columns">
          <h2> {{ $review->film->title }} </h2>
          <div>
            @foreach($myRatings as $rating)
                @if($review->user_id == $rating->user_id && $review->film_id == $rating->film_id )
                    {{ $rating->rating }}
                @endif
            @endforeach
         </div>

          <p>{{ $review->content }}</p>
            <a href="/manage-my-reviews/{{ $review->id }}/edit" class="success button">Edit</a>

            <form action="/manage-reviews/{{ $review->id }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="alert button">Delete</button>
            </form>
        </td>
        </div>
    </div>
    @endforeach
@endsection
