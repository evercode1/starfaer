<?php

namespace App\Utilities;
use App\Utilities\AdvancedRandomWordGenerator;
use App\Utilities\RandomWordGenerator;

class MakeWords
{

    public static function generate($type, $direction, $length, $count, $vowels=[], $consonants=[], $startWith)
    {

        $words = [];

        switch ($type){

            case 'advanced' :

                $generator = '\\App\Utilities\AdvancedRandomWordGenerator::makeWord';
                break;

            default:

                $generator = '\\App\Utilities\RandomWordGenerator::makeWord';
                break;


        }

        for( $i = 0; $i < $count; $i++){

            $word = $generator($direction, $length, $vowels, $consonants, $startWith);

            array_push($words, $word);


        }

        return $words;


    }


}