<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\UnauthorizedException;
use App\Star;
use App\Planet;

class FixStarPlanetCountController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {

        if($request->fix == 'fix'){

            $stars = Star::all();

            foreach ($stars as $star){

                // get planets for that star


                $count = Planet::where('star_id', $star->id)
                    ->orderBy('planet_number_from_star', 'asc')
                    ->count();

                $star->update(['planet_count' => $count]);



            }

            return view('planet-generator.confirmation-star-planet-count');

        }

        throw new UnauthorizedException();

    }
}
