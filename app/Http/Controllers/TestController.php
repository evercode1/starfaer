<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Moon;

class TestController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {

        $planets = Planet::where([['planet_type_id', '=', 6],
                                  ['planet_number_from_star', '>', 2]])->get();

        foreach($planets as $planet){


            echo $planet->id . ' - ' . $planet->name . ' - '
                . $planet->planet_number_from_star . '<br/>';


        }


//        $moons = Moon::where('description', 0)->count();
//
//        dd($moons);




//        $planets = Planet::with('moons')->where('planet_type_id', 3)->get();
//
//        foreach ($planets as $planet){
//
//            echo $planet->id . ' - ' . $planet->name . ' - ' . $planet->moons->count() . '<br/>';
//
//
//        }


//        $moons = Moon::where('planet_id', 0)->get();
//
//        foreach($moons as $moon){
//
//            echo $moon->id . ' - ' . $moon->name . '<br/>';
//
//
//        }



           //return view('test.index');

    }


}
