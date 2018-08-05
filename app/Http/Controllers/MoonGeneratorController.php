<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use MoonSeeder;
use Illuminate\Support\Facades\Redirect;

class MoonGeneratorController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function create()
    {

        return view('moon-generator.create');

    }

    public function store(Request $request)
    {



        if ($request->seed === 'seed') {

             $this->seed();

            Return Redirect::route('moon.index');


         }

            throw new UnauthorizedException();


    }

    private function seed()
    {

        $seed = new \DatabaseSeeder();

        $seed->call(MoonSeeder::class);


    }
}
