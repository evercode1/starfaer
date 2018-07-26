<?php

namespace App\Utilities;

class RandomWordGenerator{



    public static function makeWord($length)
    {


        $length = rand(1, $length) * 2;

        $word    = '';
        $vowels     = ['a','e','i','o','u', 'ae', 'ou'];
        $consonants = [
            'b', 'c', 'd', 'f', 'g', 'h', 'k', 'l', 'm',
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z',
            'dr', 'tr', 'br', 'st', 'sh', 'k', 'cr', 'kl', 'pr'
        ];



        $max = $length/2;
        for ($i = 1; $i <= $max; $i++)
        {
            $word .= $consonants[rand(0,27)];
            $word .= $vowels[rand(0,6)];
        }

        return $word;



    }


}