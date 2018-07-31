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

        $file = base_path('seeds/aliabab.php');


        $names = FetchInsideArrayFile::get($file);

        shuffle($names);


        $destination = base_path('seeds/planets-one-seeds.php');


         UniqueNames::filter($names, $destination);












           // return view('test.index');

    }


}
