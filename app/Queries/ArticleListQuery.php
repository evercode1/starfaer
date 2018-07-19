<?php

namespace App\Queries;

use App\Post;



class ArticleListQuery
{

    public static function sendData()
    {



        $data = Post::where('is_published', 1)
                   ->limit(5)
                   ->orderBy('created_at', 'desc')
                   ->get();


        return json_encode($data);

    }



}