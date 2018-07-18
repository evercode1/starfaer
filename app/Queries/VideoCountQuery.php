<?php

namespace App\Queries;

use DB;

class VideoCountQuery
{
    public static function sendData()
    {

        $data =[];

        $rows = DB::table('videos')
                ->select(
                'categories.name as category',

                DB::raw('COUNT(videos.id) as count'))
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->orderBy('categories.name', 'asc')
            ->get();

        foreach($rows as $row){

            $data[$row->category] = $row->count;

        }



        return $data;

    }

}