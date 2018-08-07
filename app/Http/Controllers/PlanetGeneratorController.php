<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use PlanetSeeder;
use Illuminate\Support\Facades\Redirect;
use App\PlanetType;

class PlanetGeneratorController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function create()
    {

        $planetTypes = PlanetType::where('is_active', 1)->orderBy('name', 'asc')->get();

        return view('planet-generator.create', compact('planetTypes'));

    }

    public function store(Request $request)
    {



        if ($request->seed === 'seed') {

            $filename = $request->filename;

             $this->seed($filename);

            Return Redirect::route('planet.index');


         }

            throw new UnauthorizedException();


    }

    public function seed($filename)
    {

        $seeder = new PlanetSeeder($filename);

        $seeder->run();


    }
}
