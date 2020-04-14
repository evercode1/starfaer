<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilities\MoonRandomWordGenerator;
use App\Planet;
use App\Moon;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\DB;

class AddOrphanMoonsController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }


    public function store(Request $request)
    {

        $this->validate($request, [

            'fix' => 'required',
            'add_limit' => 'required|integer',

        ]);



        $words = [];

        $limit = $request->add_limit;

        for($w = 1; $w <= $limit; $w++){

            $config = $this->setConfig();

            $words [] = MoonRandomWordGenerator::makeWord($config);

        }

        $names = array_unique($words);


        foreach($names as $key => $name){



            DB::table('moons')->insert([
                'name' => $name,
                'slug' => str_slug($name, "-"),
                'planet_id' => 0,
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


        return view('moon-generator.add-orphan-moons-confirmation');


    }


    private function setConfig()
    {

        $vowels= config('vowels.latin vowels');

        $consonants = config('consonants.moon-consonants');


        return $config = ['name' => 'words',
                          'type' => 'advanced',
                          'startWith' => 'vowels_first',
                          'direction' => 'seeds_first',
                          'merge' => 'yes',
                          'wordLength' => 1,
                          'totalCount' => 1,
                          'vowels' => $vowels,
                          'consonants' => $consonants];


    }
}
