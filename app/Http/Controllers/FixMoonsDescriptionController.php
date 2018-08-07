<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moon;
use App\Exceptions\UnauthorizedException;

class FixMoonsDescriptionController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {

        $this->validate($request, [

            'fix' => 'required',
            'moon_limit' => 'required|integer',
            'moon_offset' => 'required|integer'

        ]);

        if ($request->fix == 'fix') {


            $moons = Moon::with(['surfaceType', 'atmosphere', 'planet'])->skip($request->moon_offset)->limit($request->moon_limit)->get();


            foreach ($moons as $moon) {

                    $name = ucwords($moon->name);
                    $type = $moon->surfaceType->name;
                    $mass = $moon->mass / 100;
                    $planet = $moon->planet->name;
                    $atmosphere = $moon->atmosphere->name;
                    $moonNumber = $moon->orbital_position;


                    $description = $name . ' is moon number ' . $moonNumber
                        . ' orbiting around ' . ucwords($planet) . '.  The surface type is ' . $type . '.  '
                        . $name . ' is ' . $mass . ' times the mass of the Earth\'s moon.  '
                        . 'The atmosphere on ' . $name . ' is ' . $atmosphere . '.  Even when an atmosphere is
                        present, it is typically very thin, and not life-sustaining.  Have fun exploring!';

                    $moon->update(['description' => $description]);


            }


            return view('moon-generator.fix-moons-description-confirmation');

        }

        throw new UnauthorizedException();

    }

}
