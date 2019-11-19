<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UnsubscribeController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth'], ['except' => 'confirm']);
    }


    public function edit()
    {

        $user = Auth::user();

        return view('unsubscribe.edit', compact('user'));

    }

    public function store()
    {

        $user = Auth::id();


        User::destroy($user);


        return Redirect::route('unsubscribe-confirmation');


    }

    public function confirm()
    {

        return view('unsubscribe.confirmation');

    }
}
