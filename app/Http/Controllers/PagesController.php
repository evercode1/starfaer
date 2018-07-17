<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {

        return view('pages.index');

    }

    public function about()
    {

        $content = Content::where('name', 'about')->first();

        if(Auth::check()){

            return view('content.show-auth', compact('content'));

        }

        return view('content.show', compact('content'));


    }

    public function cancelAccountConfirmation()
    {


        $content = Content::where('name', 'cancel account confirmation')->first();


        return view('content.show', compact('content'));


    }

    public function privacy()
    {

        $content = Content::where('name', 'privacy policy')->first();

        if(Auth::check()){

            return view('content.show-auth', compact('content'));

        }

        return view('content.show', compact('content'));


    }

    public function terms()
    {

        $content = Content::where('name', 'terms of service')->first();

        if(Auth::check()){

            return view('content.show-auth', compact('content'));

        }

        return view('content.show', compact('content'));


    }
}
