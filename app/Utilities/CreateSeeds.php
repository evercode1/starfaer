<?php

namespace App\Utilities;

class CreateSeeds
{


    public Static function generate($name, $type, $direction, $wordLength, $count, $vowels=[], $consonants=[])
    {


        MakeSeedsFile::make($name);


        $words = MakeWords::generate($type, $direction, $wordLength, $count, $vowels, $consonants);

        $filename = base_path('/seeds/' . $name . '.php');



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