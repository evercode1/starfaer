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

        $groupTitle = 'fun';

        $arr = ['lefty', 'righty'];



         $words = array_unique($arr);


        $filename = base_path('config/array-format-values.txt');



              foreach( $words as $key => $value){

            $contents = file($filename);
            $contents[2] = $contents[2] . "\n\n"; // Gives a new line
            file_put_contents($filename, implode('',$contents));

            $contents = file($filename);
            $contents[3] = "'" . $value . "',";
           file_put_contents($filename, implode('',$contents));

        }


        $txt =  file_get_contents(base_path('config/array-format-values.txt'));

        $config = base_path('config/archive.php');

        $contents = file_get_contents($config);

        $classParts = explode('[', $contents, 2);

        $txt = $classParts[0] . "[\n\n" . "'" . $groupTitle . "'" .  $txt . "\n\n" . $classParts[1];


        $handle = fopen($config, "w");

        fwrite($handle, $txt);

        fclose($handle);




        //AppendConfigFile::make('consonants', 'new words', $arr);


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
