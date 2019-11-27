<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){

        return view('welcome')->with([
            'tasks' =>[
                'task 1',
                'task 2',
                'task 3'
                ]
        ]);

    }

    public function foundation(){

    return view('foundation-test');

    }
}
