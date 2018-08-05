<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllMoonsQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('moons')
                    ->select('id as Id',
                             'name as Name',
                             'slug as Slug',
                             DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as Created'))
                    ->where('is_active', 1)
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('moons')
                ->select('id as Id',
                         'name as Name',
                         'slug as Slug',
                         DB::raw('DATE_FORMAT(created_at,
                                 "%m-%d-%Y") as Created'))
                ->where([['name', 'like', '%' . $keyword . '%'], ['is_active', 1]])
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}