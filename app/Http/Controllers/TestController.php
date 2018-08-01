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


class TestController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {


        $types = [ 1 => 'A-type main-sequence star',
                   4 => 'B type main sequence',
                   5 => 'Barium star',
                   16 => 'Blue supergiant star',
                   20 =>'Carbon star',
                   36 => 'Extreme helium star',
                   37 => 'F-type main-sequence star',
                   42 => 'G-type main-sequence star',
                   46 => 'Helium star',
                   52 =>'K-type main-sequence star',
                   63 => 'O-type main-sequence star',
                   86 => 'Red dwarf',
                   98 => 'Subdwarf O star',
                   106 => 'White dwarf',
                   107 => 'Wolf–Rayet star',
                   109  => 'Yellow giant'

            ];



        for( $i =0; $i < 1000; $i++){

            $typeKey = (array_rand($types, 1));

            echo $typeKey . ' - ' .$types[$typeKey] . '<br/>';


        }

                //dd($typeKey . ' - ' .$types[$typeKey]);

        // format seeds

//        $file = base_path('seeds/aliabab.php');
//
//
//        $names = FetchInsideArrayFile::get($file);
//
//        shuffle($names);
//
//
//        $destination = base_path('seeds/planets-one-seeds.php');


        // UniqueNames::filter($names, $destination);












           // return view('test.index');

    }


}
