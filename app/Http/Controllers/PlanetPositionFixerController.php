<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use App\Planet;
use App\Star;

class PlanetPositionFixerController extends Controller
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

                $planets = Planet::where('star_id', $star->id)
                           ->orderBy('planet_number_from_star', 'asc')
                           ->get();


                $position = 1;

                foreach($planets as $planet){

                    $planet->update(['planet_number_from_star' => $position]);

                    $position++;

                }

            }

            return view('planet-generator.confirmation-planet-number-from-star');

        }

        throw new UnauthorizedException();

    }

}
