<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use App\Moon;

class MoonListController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


    }

    public function show($id)
    {

        $planet =  Planet::where('id', $id)->first();

        $moons = Moon::where('planet_id', $id)
                 ->orderBy('orbital_position', 'asc')
                 ->get();

        return view('moon-list.show', compact('moons', 'planet'));



    }
}
