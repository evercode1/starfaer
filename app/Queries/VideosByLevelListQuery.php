<?php

namespace App\Queries;

use Illuminate\Http\Request;
use App\Level;
use DB;

class VideosByLevelListQuery
{

    public static function sendData()
    {



        return Level::withCount('videos')->get();



    }



}