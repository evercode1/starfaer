<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllStarsQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('stars')
                    ->select('stars.id as Id',
                             'stars.name as Name',
                             'stars.slug as Slug',
                        DB::raw('COUNT(*) as Planets'))

                    ->leftJoin('planets', 'stars.id', '=', 'planets.star_id')
                    ->where('stars.is_active', 1)
                    ->orderBy($column, $direction)
                    ->groupBy('stars.id')
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('stars')
                   ->select('stars.id as Id',
                            'stars.name as Name',
                            'stars.slug as Slug',
                       DB::raw('COUNT(*) as Planets'))

                   ->leftJoin('planets', 'stars.id', '=', 'planets.star_id')
                   ->where([['stars.name', 'like', '%' . $keyword . '%'], ['stars.is_active', 1]])
                   ->orderBy($column, $direction)
                   ->groupBy('stars.id')
                   ->paginate(10);

            return $rows;

    }

}