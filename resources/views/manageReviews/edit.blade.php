@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')

        <div class="row">
            <div class="large-12 columns">
                <h1>Edit Review for {{ $review->film->title }}</h1>
            </div>
        </div>

    <form method="post" action="/manage-my-reviews/{{ $review->id }}">
        @method('PATCH')
        @csrf
            <div class="row">
                <div class="large-12 columns">
                    <label>Review
                        <textarea name="content" rows="10" placeholder="Please leave your review" required>{{ $review->content }}</textarea>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                        <label>Rating (optional)
                        <div>
                            <div class="rating-block">
                            <div class="rating-block-rating" data-rating>
                                <div class="star" data-rating="1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37" viewBox="0 0 40 37">
                                    <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
                                </svg>
                                </div>
                                <div class="star" data-rating="2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37" viewBox="0 0 40 37">
                                    <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
                                </svg>
                                </div>
                                <div class="star" data-rating="3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37" viewBox="0 0 40 37">
                                    <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
                                </svg>
                                </div>
                                <div class="star" data-rating="4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37" viewBox="0 0 40 37">
                                    <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
                                </svg>
                                </div>
                                <div class="star" data-rating="5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37" viewBox="0 0 40 37">
                                    <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
                                </svg>
                                </div>
                            </div>
                            </div>
                        </div>



                        <input type="hidden" name="rating" min="1" max="5" value={{ $userRatingReturn }} >
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
