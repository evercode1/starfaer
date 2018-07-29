<?php

namespace App\Http\Controllers;

use App\Utilities\FindOrCreateFolders;
use App\Utilities\MakeConfigFile;
use App\Utilities\MakeWords;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Utilities\RandomWordGenerator;
use App\Utilities\CreateSeeds;
use App\Utilities\AppendConfigFile;

class TestController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {


        $arr = ['some', 'things', 'are', 'hard'];

        AppendConfigFile::make('consonants', 'thingy', $arr);


//       $words = array_unique($words);
//
//
//        $filename = base_path('/config/' . 'star-name-seeds' . '.php');
//
//
//
//        foreach( $words as $key => $value){
//
//            $contents = file($filename);
//            $contents[12] = $contents[12] . "\n\n"; // Gives a new line
//            file_put_contents($filename, implode('',$contents));
//
//            $contents = file($filename);
//            $contents[13] = "'" . $value . "',";
//            file_put_contents($filename, implode('',$contents));
//
//        }











           // return view('test.index');

    }


}
