<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;

class PlanetDescriptionFixerController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {

        if($request->fix == 'fix'){


                $planets = Planet::with(['star','atmosphere', 'planetType'])->get();


                foreach($planets as $planet){

                    $name = ucwords($planet->name);
                    $type = $planet->planetType->name;
                    $star = ucwords($planet->star->name);
                    $mass = $planet->mass / 100;
                    $atmosphere = $planet->atmosphere->name;
                    $planetNumber = $planet->planet_number_from_star;
                    $moonCount = $planet->moon_count;
                    $life = $planet->is_life_present;
                    $rings = $planet->is_ringed;
                    $moonMultiple = $moonCount == 1 ? ' moon.  ' :  ' moons.  ';

                    $lifePresent = $life == 1 ? 'Life is present on the planet.  ' : 'There is no life on the planet.  ';

                    $ringed =  $rings == 1 ? $name . ' has rings' : '';


                    $description = $name . ' is planet number ' . $planetNumber
                                   . ' orbiting around '. $star . '.  The planet classification is ' . $type . '.  '
                                   . $name . ' is ' . $mass . ' times the mass of Earth.  '
                                   . 'The atmosphere on ' . $name . ' is ' . $atmosphere . '.  '
                                   .  $lifePresent
                                   . $name . ' has ' . $moonCount . $moonMultiple . $ringed;

                    $planet->update(['description' => $description]);



                }



            return view('planet-generator.confirmation-fix-planet-descriptions');

        }

        throw new UnauthorizedException();

    }
}
