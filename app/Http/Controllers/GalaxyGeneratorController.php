<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Utilities\FetchInsideArrayFile;
use Illuminate\Http\Request;
use GalaxySeeder;
use Illuminate\Support\Facades\Redirect;

class GalaxyGeneratorController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function create()
    {

        return view('galaxy-generator.create');

    }

    public function store(Request $request)
    {



        if ($request->seed === 'seed') {

             $this->seed();

            Return Redirect::route('galaxy.index');


         }

            throw new UnauthorizedException();


    }

    private function seed()
    {

        $seed = new \DatabaseSeeder();

        $seed->call(GalaxySeeder::class);


    }
}
