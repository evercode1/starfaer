<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllZonesQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('zones')
                    ->select('zones.id as Id',
                             'zones.name as Name',
                             'zones.slug as Slug',
                             'zones.coordinates as Coordinates',
                             'zone_types.name as Type',
                             'zone_types.id as TypeId',
                             DB::raw('DATE_FORMAT(zones.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('zone_types', 'zone_type_id', '=', 'zone_types.id')
                    ->where('is_active', 1)
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('zones')
                ->select('zones.id as Id',
                         'zones.name as Name',
                         'zones.slug as Slug',
                         'zones.coordinates as Coordinates',
                         'zone_types.name as Type',
                         'zone_types.id as TypeId',
                         DB::raw('DATE_FORMAT(zones.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('zone_types', 'zone_type_id', '=', 'zone_types.id')
                ->where([['name', 'like', '%' . $keyword . '%'], ['is_active', 1]])
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}