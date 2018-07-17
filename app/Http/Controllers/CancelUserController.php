<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CancelUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function update()
    {

        $user = Auth::user();

        $user->update(['status_id' => 5]);

        Auth::logout();

        return Redirect::route('cancel.cancel-account-confirmation');


    }
}
