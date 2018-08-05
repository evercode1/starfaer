<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use SurfaceTypeSeeder;
use Illuminate\Support\Facades\Redirect;

class SurfaceTypeGeneratorController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function create()
    {

        return view('surface-type-generator.create');

    }

    public function store(Request $request)
    {



        if ($request->seed === 'seed') {

             $this->seed();

            Return Redirect::route('surface-type.index');


         }

            throw new UnauthorizedException();


    }

    private function seed()
    {

        $seed = new \DatabaseSeeder();

        $seed->call(SurfaceTypeSeeder::class);


    }
}
