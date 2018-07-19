<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllArticlesController extends Controller
{
    public function index()
    {
        if ( Auth::check() ){

            return view('all-articles.index');


        }

        return view('all-articles.index-guest');

    }
}
