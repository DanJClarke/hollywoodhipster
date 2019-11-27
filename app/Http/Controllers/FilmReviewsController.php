<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class FilmReviewsController extends Controller
{
    public function destroy($id)
    {
       Review::find($id)->delete();

       $film_id = request('film_id');

       return redirect('/films/'. $film_id);
    }
}
