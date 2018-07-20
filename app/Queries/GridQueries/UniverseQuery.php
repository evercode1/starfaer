<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class UniverseQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('universes')
                    ->select('id as Id',
                             'name as Name',
                             'author as Author',
                             'slug as Slug',
                             DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as Created'))
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('universes')
                ->select('id as Id',
                         'name as Name',
                         'author as Author',
                         'slug as Slug',
                         DB::raw('DATE_FORMAT(created_at,
                                 "%m-%d-%Y") as Created'))
                ->where('name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}