<?php

namespace App\Utilities;


class MakeWords
{

    public static function generate($length, $count)
    {

        $words = [];

        for( $i = 0; $i < $count; $i++){

            $word = RandomWordGenerator::makeWord($length);

            array_push($words, $word);


        }

        return $words;


    }


}