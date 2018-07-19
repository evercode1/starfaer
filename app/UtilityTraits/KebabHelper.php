<?php

namespace App\UtilityTraits;

trait KebabHelper
{


    public static function formatString($string)
    {

        return strtolower(str_replace(" ","-", $string));

    }




}