<?php

namespace App\Http\Controllers;

use App\Review;
use App\Rating;
use App\User;
use Auth;
use Gate;
use Illuminate\Http\Request;

class MyReviewsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        if(Gate::denies('manage-users')){
            return redirect()->route('home');
        }

        $userRatingReturn = null;

        $usersRating = $review->user->ratings->where('film_id', '=', $review->film_id);

        if($usersRating->count()){
            $userRatingReturn = $usersRating->first()->rating;
        }

        return view('manageReviews.edit', compact('review', 'userRatingReturn'));
    }

    /**
     * Display the specified resource
     *
     * @param  \App\User  $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $myReviews = Review::all()->where('user_id', '=', $user->id);
        $myRatings = Rating::all()->where('user_id', '=', $user->id);

        return view('manageReviews.show', compact('myReviews', 'myRatings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Review  $review
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Review $review)
    {
        if(Gate::denies('manage-users')){

            return redirect()->route('home');
        }

        request()->validate([
            'content'       => 'required',
            'user_id'       => 'integer|required',
            'film_id'       => 'integer|required',
            'rating'        => 'nullable|integer|max:5|min:1'
        ]);

        $review->update([
            'content'       => request('content')
        ]);

        if(request()->rating){
            Rating::updateOrCreate([
                'film_id'   => request('film_id'),
                'user_id'   => Auth::user()->id
            ],[
                'rating'    => request('rating')
            ]);
        }

        return redirect('/manage-my-reviews/' . $review->user_id);
    }
}
