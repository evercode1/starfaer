<?php

namespace App\Queries;

use Illuminate\Http\Request;
use App\Category;
use App\Videos;
use DB;

class VideosByCategoryListQuery
{

    public static function sendData()
    {

        return Category::withCount('videos')->get();



    }



}