<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use App\Moon;
use App\Exceptions\UnauthorizedException;

class FixMoonsOrbitalPositionController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {

        $this->validate($request, [

            'fix' => 'required',
            'planet_limit' => 'required|integer',
            'offset' => 'required|integer'

        ]);

        if ($request->fix == 'fix') {

            $planets = Planet::where('is_active', 1)->skip($request->offset)->limit($request->planet_limit)->get();

            foreach ($planets as $planet) {

                // get moons for that planet

                $moons = Moon::where('planet_id', $planet->id)->get();


                $position = 1;

                foreach ($moons as $moon) {

                    $moon->update(['orbital_position' => $position]);

                    $position ++;

                }

            }

            return view('moon-generator.confirmation-moon-orbital-position');

        }

        throw new UnauthorizedException();

    }
}
