<?php

namespace App\Queries\GridQueries;
use DB;


class VideoByLevelQuery
{

    public function data($column, $direction, $level)
    {

        $rows = DB::table('videos')
                    ->select('videos.id as Id',
                             'videos.title as Title',
                             'videos.author as Author',
                             'videos.slug as Slug',
                             'videos.url as Url',
                             'categories.name as Category',
                             'levels.name as Level',
                             'videos.is_featured as Featured',
                             DB::raw('DATE_FORMAT(videos.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('categories', 'category_id', '=', 'categories.id')
                    ->leftJoin('levels', 'level_id', '=', 'levels.id')
                    ->where('videos.level_id', $level)
                    ->orderBy($column, $direction)
                    ->paginate(5);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword, $level)
    {


        if ($column === 'Added'){

            $column = 'videos.created_at';

        }

        if ($column === 'Cat'){

            $column = 'videos.category_id';

        }

        if ($column === 'Level'){

            $column = 'videos.level_id';

        }




       $rows = DB::table('videos')
                ->select('videos.id as Id',
                         'videos.title as Title',
                         'videos.author as Author',
                         'videos.slug as Slug',
                         'videos.url as Url',
                         'categories.name as Category',
                         'levels.name as Level',
                         'videos.is_featured as Featured',
                         DB::raw('DATE_FORMAT(videos.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('categories', 'category_id', '=', 'categories.id')
                ->leftJoin('levels', 'level_id', '=', 'levels.id')
                ->Where('Title', 'like', '%' . $keyword . '%')
                //->Where('Author', 'like', '%' . $keyword . '%')
                ->Where('videos.level_id', $level)
                ->orderBy($column, $direction)
                ->paginate(5);


            return $rows;

    }

}