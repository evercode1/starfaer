<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moon;
use App\Planet;
use App\Exceptions\UnauthorizedException;

class FixPlanetMoonCountController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {

        if($request->fix == 'fix'){

            $planets = Planet::all();

            foreach ($planets as $planet){

                // get moons for that planet


                $count = Moon::where('planet_id', $planet->id)
                    ->orderBy('orbital_position', 'asc')
                    ->count();

                $planet->update(['moon_count' => $count]);



            }

            return view('moon-generator.confirmation-planet-moon-count');

        }

        throw new UnauthorizedException();

    }
}
