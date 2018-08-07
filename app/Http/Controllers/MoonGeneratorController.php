<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use MoonSeeder;
use Illuminate\Support\Facades\Redirect;
use App\Planet;
use App\Utilities\MoonRandomWordGenerator;
use DB;
use App\Moon;


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

        $this->validate($request, [

            'seed' => 'required',
            'limit' => 'required|integer',



        ]);



        $words = [];

        $limit = $request->limit;

        for($w = 1; $w <= $limit; $w++){

            $config = $this->setConfig();

            $words [] = MoonRandomWordGenerator::makeWord($config);

        }

        $names = array_unique($words);


            DB::table('moons')->truncate();


        foreach($names as $key => $name){


                    DB::table('moons')->insert([
                        'name' => $name,
                        'slug' => str_slug($name, "-"),
                        'planet_id' => rand(1, 12350),
                        'surface_type_id' => rand(1, 6),
                        'atmosphere_id' => rand(1, 13),
                        'mass' => rand(40, 300),
                        'orbital_position' => 0,
                        'universe_id' => 1,
                        'galaxy_id' => 3,
                        'is_active' => 1,
                        'description' => 0,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);





        }








        Return Redirect::route('moon.index');

//        if ($request->seed === 'seed') {
//
//             $this->seed();
//
//            Return Redirect::route('moon.index');
//
//
//         }
//
//            throw new UnauthorizedException();


    }

    private function seed()
    {

        $seed = new \DatabaseSeeder();

        $seed->call(MoonSeeder::class);


    }

    private function setConfig()
    {

        $vowels= config('vowels.latin vowels');

        $consonants = config('consonants.moon-consonants');


        return $config = ['name' => 'words',
                          'type' => 'advanced',
                          'startWith' => 'consonants_first',
                          'direction' => 'seeds_first',
                          'merge' => 'yes',
                          'wordLength' => 1,
                          'totalCount' => 1,
                          'vowels' => $vowels,
                          'consonants' => $consonants];


    }
}
