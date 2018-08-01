<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use StarSeeder;
use Illuminate\Support\Facades\Redirect;

class StarGeneratorController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function create()
    {

        return view('star-generator.create');

    }

    public function store(Request $request)
    {



        if ($request->seed === 'seed') {

             $this->seed();

            Return Redirect::route('star.index');


         }

            throw new UnauthorizedException();


    }

    private function seed()
    {

        $seed = new \DatabaseSeeder();

        $seed->call(StarSeeder::class);


    }
}
