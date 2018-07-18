<?php

namespace App\Queries;

use App\Video;



class VideoListQuery
{

    public static function sendData()
    {



        $data = Video::orderBy('created_at', 'desc')
                              ->limit(4)
                              ->get();

        return json_encode($data);

    }



}