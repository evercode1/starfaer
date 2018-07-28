<?php

namespace App\Utilities;

class RandomStarGenerator{



    public static function makeWord($length, $vowels=[], $consonants=[])
    {


        $length = rand(1, $length) * 2;

        $word    = '';

        $baseVowels     = array('a','e','i','o','u');
        $baseConsonants = array(
            'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z',
            'dr', 'tr', 'br', 'st', 'k', 'cr', 'kl', 'pr', 'th'
        );

        // Seed it

        srand((double) microtime() * 1000000);


        $countVowels = count($vowels) - 1;

        $countConsonants = count($consonants) -1 ;

        $countBaseVowels = count($baseVowels) - 1;

        $countBaseConsonants = count($baseConsonants) -1 ;

        $max = $length/2;

        for ($i = 1; $i <= $max; $i++)
        {
            $word .= $consonants[rand(0, $countConsonants)];

            $word .= $vowels[rand(0, $countVowels)];
        }

        return $word;



    }


}