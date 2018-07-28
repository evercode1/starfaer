<?php

namespace App\Utilities;
use App\Utilities\RandomStarGenerator;
use App\Utilities\RandomWordGenerator;

class MakeWords
{

    public static function generate($type, $length, $count, $vowels=[], $consonants=[])
    {

        $words = [];

        switch ($type){

            case 'star' :

                $generator = '\\App\Utilities\RandomStarGenerator::makeWord';
                break;

            default:

                $generator = '\\App\Utilities\RandomWordGenerator::makeWord';
                break;


        }

        for( $i = 0; $i < $count; $i++){

            $word = $generator($length, $vowels, $consonants);

            array_push($words, $word);


        }

        return $words;


    }


}