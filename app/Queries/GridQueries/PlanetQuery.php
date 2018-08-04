<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class PlanetQuery implements DataQuery
{

    public function data($column, $direction)
    {

        if($column =='Star'){

            $column = 'stars.name';

        }

        $rows = DB::table('planets')
                    ->select('planets.id as Id',
                             'planets.name as Name',
                             'planets.slug as Slug',
                             'planets.is_active as Active',
                             'stars.name as Starname',
                             'stars.id as Starid',
                             'planets.image_name as Image',
                             'planets.image_extension as Extension',
                             DB::raw('DATE_FORMAT(planets.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('stars', 'star_id', '=', 'stars.id')
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        if($column =='Star'){

            $column = 'stars.name';

        }


        $rows = DB::table('planets')
                ->select('planets.id as Id',
                         'planets.name as Name',
                         'planets.slug as Slug',
                         'planets.is_active as Active',
                         'planets.image_name as Image',
                         'stars.name as Starname',
                         'stars.id as Starid',
                         'planets.image_extension as Extension',
                         DB::raw('DATE_FORMAT(planets.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('stars', 'star_id', '=', 'stars.id')
                ->where('planets.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}