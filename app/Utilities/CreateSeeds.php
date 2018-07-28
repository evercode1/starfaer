<?php

namespace App\Utilities;

class CreateSeeds
{


    public Static function generate($name, $type, $wordLength, $count, $vowels=[], $consonants=[])
    {


        MakeConfigFile::make($name);


        $words = MakeWords::generate($type, $wordLength, $count, $vowels, $consonants);

        $filename = base_path('/config/' . $name . '.php');



        foreach( $words as $key => $value){

            $contents = file($filename);
            $contents[12] = $contents[12] . "\n\n"; // Gives a new line
            file_put_contents($filename, implode('',$contents));

            $contents = file($filename);
            $contents[13] = "'" . $value . "',";
            file_put_contents($filename, implode('',$contents));

        }




    }




}