<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use ZoneSeeder;
use Illuminate\Support\Facades\Redirect;

class ZoneGeneratorController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function create()
    {

        return view('zone-generator.create');

    }

    public function store(Request $request)
    {



        if ($request->seed === 'seed') {

             $this->seed();

            Return Redirect::route('zone.index');


         }

            throw new UnauthorizedException();


    }

    private function seed()
    {

        $seed = new \DatabaseSeeder();

        $seed->call(ZoneSeeder::class);


    }
}
