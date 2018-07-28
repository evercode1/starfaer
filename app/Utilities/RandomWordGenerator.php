<?php

namespace App\Utilities;

class RandomWordGenerator{



    public static function makeWord($length, $vowels=[], $consonants=[])
    {


        $length = rand(1, $length) * 2;

        $word    = '';


        // Seed it

        srand((double) microtime() * 1000000);


        $countVowels = count($vowels) - 1;

        $countConsonants = count($consonants) -1 ;


        $max = $length/2;

        for ($i = 1; $i <= $max; $i++)
        {
            $word .= $consonants[rand(0, $countConsonants)];

            $word .= $vowels[rand(0, $countVowels)];
        }

        return $word;



    }


}