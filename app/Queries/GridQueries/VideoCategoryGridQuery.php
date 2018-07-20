<?php

namespace App\Queries\GridQueries;

use Illuminate\Http\Request;
use App\Queries\GridQueries\VideoByCategoryQuery;

class VideoCategoryGridQuery
{
    public static function sendData(Request $request, $query)
    {

        $class = '\\App\Queries\GridQueries\\' . $query;

        $query =  new $class();
        // set sort by column and direction

        list($column, $direction) = static::setSort($request, $query);


        // search by keyword with column sort

        if ($request->has('keyword')) {

            return static::keywordFilter($request, $query, $column, $direction);

        }

        // return data

        return static::getData($query, $column, $direction, $request);

    }

    public static function setSort(Request $request, $query)
    {
        // set sort by column with default

        list($column, $direction) = static::setDefaults($query);

        if ($request->has('column')) {

            $column = $request->get('column');


            if ($column == 'id') {

                $direction = $request->get('direction') == 1 ? 'asc' : 'desc';

                return [$column, $direction];

            } else {

                $direction = $request->get('direction') == 1 ? 'desc' : 'asc';

                return [$column, $direction];

            }
        }

        return [$column, $direction];

    }

    public static function setDefaults($query)
    {

        switch ($query){

            case $query instanceof PostQuery :
                $column = 'posts.created_at';
                $direction = 'desc';
                break;
            case $query instanceof ContactQuery :
                $column = 'id';
                $direction = 'desc';
                break;
            case $query instanceof VideoQuery :
                $column = 'videos.created_at';
                $direction = 'desc';
                break;
            case $query instanceof VideoByCategoryQuery :
                $column = 'videos.created_at';
                $direction = 'desc';
                break;
            default:
                $column = 'id';
                $direction = 'asc';
                break;

        }

        return list($column, $direction) = [$column, $direction];

    }

    public static function keywordFilter(Request $request, $query, $column, $direction)
    {
        $keyword = $request->get('keyword');

        $category = $request->get('category');


        return response()->json($query->filteredData($column, $direction, $keyword, $category));

    }

    public static function getData($query, $column, $direction, $request)
    {

        $category = $request->get('category');

        return response()->json($query->data($column, $direction, $category));

    }

}