<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateMoonOrbitPosition;
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

            $planets = Planet::all();

            foreach ($planets as $planet) {

                $this->dispatch(new UpdateMoonOrbitPosition($planet));

            }

            return view('moon-generator.confirmation-moon-orbital-position');

        }

        throw new UnauthorizedException();

    }
}
