<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use App\Moon;
use App\Exceptions\UnauthorizedException;

class FixPlanetMoonLeftoversController extends Controller
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

                switch($planet->planet_type_id){

                    case 3 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;

                    case 4 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;

                    case 6 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;

                    case 9 :

                    if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                        foreach($moons as $moon){

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }



                    break;

                    case 18 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;

                    case 19 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;

                    case 26 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;

                    case 27 :

                        if($moons = Moon::where('planet_id', 0)->limit(5)->get()){

                            foreach($moons as $moon){

                                $moon->update(['planet_id' => $planet->id]);

                            }

                        }



                        break;



                }




            }

            return view('moon-generator.confirmation-planet-moon-leftovers');

        }

        throw new UnauthorizedException();

    }
}
