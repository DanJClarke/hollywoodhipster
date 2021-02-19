@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')

        <div class="row">
            <div class="large-12 columns">
                <h1>Edit Review for {{ $review->film->title }}</h1>
            </div>
        </div>

    <form method="post" action="/manage-my-reviews/{{ $review->id }}" >
        @method('PATCH')
        @csrf
            <div class="row">
                <div class="large-12 columns">
                    <label>Review
                        <textarea name="content" rows="10" placeholder="Please leave your review" required>{{ $review->content }}</textarea>
                    </label>
                </div>
            </div>
            <div class="row" id="root">
                <div class="large-12 columns">
                        <label>Rating (optional)
                        <rating :initial-rating="{{ $userRatingReturn }}" :active="true"></rating>
                    </label>
                </div>
            </div>
            <br/>
            <br/>
            <div class="row">
                <div class="large-12 columns">
                    <input type="hidden" name="film_id" value="{{ $review->film_id }}" />
                    <input type="hidden" name="user_id" value="{{ $review->user_id }}" />
                    <button class="button" name="submit" type="submit">Update Review</button>
                </div>
            </div>
        </form>

        <form action="/manage-reviews/{{ $review->id }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="large-12 columns">

                    <button type="submit" class="alert button">Delete</button>
                </div>
            </div>
        </form>

    @include('errors')

    <div class="row">
        <div class="large-12 columns">
            <a href="/manage-my-reviews/{{ Auth::user()->id }}">&laquo; Back to my reviews</a>
        </div>
    </div>

@endsection
