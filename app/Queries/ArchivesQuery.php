<?php

namespace App\Queries;

use DB;
use App\Post;
use Carbon\Carbon;

class ArchivesQuery
{

    public static function sendData()
    {

        $archives = DB::table('posts')->select(DB::raw('Year(published_at) as year'),
                                               DB::raw('month(posts.published_at) as month'),
                                               DB::raw("count(posts.id) as `count`"))
                    ->where('is_published', 1)
                    ->groupBy('year', 'month')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc')
                    ->get();

            return json_encode($archives);


    }






}