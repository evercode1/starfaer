<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moon;
use App\Planet;
use App\Exceptions\UnauthorizedException;

class FixPlanetMoonTypesController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function update(Request $request)
    {

        $this->validate($request, [

            'fix' => 'required',
            'remove_offset' => 'required|integer',
            'limit_offset' => 'required|integer'


        ]);

        if($request->fix == 'fix'){

            $planets = Planet::where('is_active', 1)->skip($request->remove_offset)->limit($request->remove_limit)->get();

            foreach ($planets as $planet){

                switch($planet->planet_type_id){

                    case 2 :

                        $moons = Moon::where('planet_id', $planet->id)->get();

                        foreach($moons as $moon){

                            $moon->update(['planet_id' => 0]);

                        }

                        break;

                    case 7 :

                        $moons = Moon::where('planet_id', $planet->id)->get();

                        foreach($moons as $moon){

                            $moon->update(['planet_id' => 0]);

                        }

                        break;

                    case 17 :

                        $moons = Moon::where('planet_id', $planet->id)->get();

                        foreach($moons as $moon){

                            $moon->update(['planet_id' => 0]);

                        }

                        break;

                    case 20 :

                        $moons = Moon::where('planet_id', $planet->id)->get();

                        foreach($moons as $moon){

                            $moon->update(['planet_id' => 0]);

                        }

                        break;

                    case 21 :

                        $moons = Moon::where('planet_id', $planet->id)->get();

                        foreach($moons as $moon){

                            $moon->update(['planet_id' => 0]);

                        }

                        break;


                }




            }

            return view('moon-generator.confirmation-planet-moon-type');

        }

        throw new UnauthorizedException();

    }
}
