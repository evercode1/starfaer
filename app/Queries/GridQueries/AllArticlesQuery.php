<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllArticlesQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('posts')
                    ->select('posts.id as Id',
                             'posts.title as Title',
                             'posts.slug as Slug',
                             'categories.name as Category',
                              DB::raw('DATE_FORMAT(posts.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('categories', 'category_id', '=', 'categories.id')
                    ->where('is_published', 1)
                    ->orderBy($column, $direction)
                    ->paginate(5);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {


        if ($column === 'Added'){

            $column = 'blog_resources.created_at';

        }


        $rows = DB::table('posts')
                ->select('posts.id as Id',
                         'posts.title as Title',
                         'posts.slug as Slug',
                         'categories.name as Category',
                          DB::raw('DATE_FORMAT(posts.created_at,
                                  "%m-%d-%Y") as Created'))
                ->leftJoin('categories', 'category_id', '=', 'categories.id')
                ->where([['title', 'like', '%' . $keyword . '%'],['is_published', 1]])
                ->orWhere([['categories.name', 'like', '%' . $keyword . '%'],['is_published', 1]])
                ->orderBy($column, $direction)
                ->paginate(5);

            return $rows;

    }

}