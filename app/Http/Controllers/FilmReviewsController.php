<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class FilmReviewsController extends Controller
{
    public function destroy(Review $review)
    {
       $review->delete();
       return back();
    }
}
