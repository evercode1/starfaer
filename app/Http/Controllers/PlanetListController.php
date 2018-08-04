<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Planet;
use App\Star;

class PlanetListController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


    }

    public function show($id)
    {

        $star =  Star::where('id', $id)->first();

        $planets = Planet::where('star_id', $id)
                   ->orderBy('planet_number_from_star', 'asc')
                   ->get();

        return view('planet-list.show', compact('planets', 'star'));



    }
}
