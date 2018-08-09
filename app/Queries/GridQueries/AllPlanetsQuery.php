<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllPlanetsQuery implements DataQuery
{

    public function data($column, $direction)
    {

        switch($column){

            case 'Planet Name' :

                $column = 'planets.name';
                break;

            case 'Moons' :

                $column = 'Moon';
                break;

            case 'Life Present' :

                $column = 'planets.is_life_present';
                break;

            case 'Orbits Star' :

                $column = 'stars.name';
                break;


        }


        $rows = DB::table('planets')
            ->select('planets.id as Id',
                'planets.name as Name',
                'planets.slug as Slug',
                'planets.is_active as Active',
                'planets.is_life_present as Life',
                'stars.name as Starname',
                'stars.id as Starid',
                'planets.image_extension as Extension',
                DB::raw('DATE_FORMAT(planets.created_at,
                                 "%m-%d-%Y") as Created'),
                DB::raw('COUNT(*) as Moon'))
            ->leftJoin('stars', 'planets.star_id', '=', 'stars.id')
            ->leftJoin('moons', 'planets.id', '=', 'moons.planet_id')
            ->where('planets.is_active', 1)
            ->orderBy($column, $direction)
            ->groupBy('planets.id')
            ->paginate(10);


             return $rows;




    }

    public function filteredData($column, $direction, $keyword)
    {

        switch($column){

            case 'Planet Name' :

                $column = 'planets.name';
                break;

            case 'Moons' :

                $column = 'Moon';
                break;

            case 'Life Present' :

                $column = 'planets.is_life_present';
                break;

            case 'Orbits Star' :

                $column = 'stars.name';
                break;


        }




        $rows = DB::table('planets')
            ->select('planets.id as Id',
                'planets.name as Name',
                'planets.slug as Slug',
                'planets.is_active as Active',
                'planets.is_life_present as Life',
                'stars.name as Starname',
                'stars.id as Starid',
                'planets.image_extension as Extension',
                DB::raw('DATE_FORMAT(planets.created_at,
                                 "%m-%d-%Y") as Created'),
                DB::raw('COUNT(*) as Moon'))
            ->leftJoin('stars', 'planets.star_id', '=', 'stars.id')
            ->leftJoin('moons', 'planets.id', '=', 'moons.planet_id')
            ->where([['planets.name', 'like', '%' . $keyword . '%'], ['planets.is_active', 1]])
            ->orderBy($column, $direction)
            ->groupBy('planets.id')
            ->paginate(10);

            return $rows;

    }

}