<?php

namespace App\Http\Controllers;

use App\Review;
use App\Rating;
use App\User;
use Auth;
use Gate;
use Illuminate\Http\Request;

class FilmReviewsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Review::create(request()->validate([
            'content' => ['required'],
            'film_id' => ['required'],
            'user_id' => ['required'],
        ]));

        return response()->json('comment stored!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $manage_review
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $manage_review)
    {
        if(Gate::denies('manage-users')){
            return redirect()->route('home');
        }

        $userRatingReturn = null;

        $usersRating = $manage_review->user->ratings->where('film_id', '=', $manage_review->film_id);

        if($usersRating->count()){
            $userRatingReturn = $usersRating->first()->rating;
        }

        return view('manageReviews.edit', compact('review', 'userRatingReturn'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $manage_review
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $manage_review)
    {
        if(Gate::denies('manage-users')){
            return back();
        }

        Rating::where('film_id', $manage_review->film_id)->where('user_id', $manage_review->user_id)->delete();

        $manage_review->delete();
        return redirect('/manage-my-reviews/' . $manage_review->user_id);
    }
}
