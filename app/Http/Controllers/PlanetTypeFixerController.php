<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use App\Exceptions\UnauthorizedException;

class PlanetTypeFixerController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {


        if($request->fix == 'fix'){


            $operator = $request->less_or_greater_than == 1 ? '>' : '<';

            $planets = Planet::where([['planet_type_id', '=', $request->planet_type_id],
                ['planet_number_from_star', "$operator" , $request->position]])->get();

            foreach($planets as $planet){


               $planet->update(['planet_type_id' => $request->change_planet_type_id]);


                echo $planet->id . ' - ' . $planet->name . ' - '
                    . $planet->planetType->name . ' - '
                    . $planet->planet_number_from_star . '<br/>';

            }


          return view('planet-generator.confirmation-planet-types-fixed');

        }

        throw new UnauthorizedException();








    }
}
