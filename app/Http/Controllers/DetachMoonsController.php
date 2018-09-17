<?php

namespace App\Http\Controllers;

use App\Exceptions\NoMoonsException;
use App\Rules\MoonNameExists;
use App\Rules\PlanetNameExists;
use Illuminate\Http\Request;
use App\Planet;
use App\Moon;

class DetachMoonsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);

    }

    public function edit()
    {

        return view('detach-moons.edit');


    }

    public function update(Request $request)
    {

        $this->validate($request, [

            'name' => ['required','string', new PlanetNameExists()],
            'moon_name' => [new MoonNameExists()]

        ]);



        $planet = Planet::where('name', $request->name)->first();



            if( ! $request->moon_name){

                $moons = Moon::where('planet_id', $planet->id)->get();

                if(! count($moons) > 0){

                    throw new NoMoonsException();
                }

                // detach moons

                foreach($moons as $moon){

                    $moon->update(['planet_id' => 0]);


                }

                $count = Moon::where('planet_id', $planet->id)
                         ->orderBy('orbital_position', 'asc')
                         ->count();

                $planet->update(['moon_count' => $count]);

                $this->assignMoons();

                return view('detach-moons.confirmation');


            } else {

                $moon = Moon::where('name', $request->moon_name)->first();

                $moon->update(['planet_id' => 0]);

                $count = Moon::where('planet_id', $planet->id)
                         ->orderBy('orbital_position', 'asc')
                         ->count();

                $planet->update(['moon_count' => $count]);

                $this->assignMoons();

                return view('detach-moons.confirmation');




            }





    }

    private function assignMoons()
    {


        $planets = Planet::where('is_active', 1)
            ->skip(rand(1,12000))
            ->limit(100)
            ->get();

        foreach ($planets as $planet) {

            switch ($planet->planet_type_id) {

                case 3 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 4 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 6 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 9 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 18 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 19 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 26 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;

                case 27 :

                    if ($moons = Moon::where('planet_id', 0)->limit(5)->get()) {

                        foreach ($moons as $moon) {

                            $moon->update(['planet_id' => $planet->id]);

                        }

                    }


                    break;


            }


        }
    }
}
