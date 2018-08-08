<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllMoonsQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('moons')
                    ->select('moons.id as Id',
                             'moons.name as Name',
                             'moons.slug as Slug',
                             'planets.id as PlanetId',
                             'planets.name as Planet'
                             )
                    ->leftJoin('planets', 'moons.planet_id', '=', 'planets.id')
                    ->where('moons.is_active', 1)
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('moons')
                ->select('moons.id as Id',
                         'moons.name as Name',
                         'moons.slug as Slug',
                         'planets.id as PlanetId',
                         'planets.name as Planet'
                         )
                ->leftJoin('planets', 'moons.planet_id', '=', 'planets.id')
                ->where([['moons.name', 'like', '%' . $keyword . '%'], ['moons.is_active', 1]])
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}