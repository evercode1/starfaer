<?php

namespace App\Http\Controllers;

use App\Utilities\FetchInsideArrayFile;
use App\Utilities\FindOrCreateFolders;
use App\Utilities\MakeConfigFile;
use App\Utilities\MakeWords;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Utilities\RandomWordGenerator;
use App\Utilities\CreateSeeds;
use App\Utilities\AppendConfigFile;
use App\Utilities\UniqueNames;
use App\Planet;
use App\Moon;

class TestController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {


//        $moons = Moon::where('description', 0)->count();
//
//        dd($moons);




//        $planets = Planet::with('moons')->where('planet_type_id', 3)->get();
//
//        foreach ($planets as $planet){
//
//            echo $planet->id . ' - ' . $planet->name . ' - ' . $planet->moons->count() . '<br/>';
//
//
//        }


        $moons = Moon::where('planet_id', 0)->get();

        foreach($moons as $moon){

            echo $moon->id . ' - ' . $moon->name . '<br/>';


        }



           //return view('test.index');

    }


}
