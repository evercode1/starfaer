<?php

namespace App\Queries;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LifeZonesQuery
{

    public static function sendData(Request $request)
    {

        $row = DB::table('planets')
                ->select('planets.name as Name',
                'planets.id as Id',
                'zones.name as Zone')
                ->leftJoin('stars', 'planets.star_id', '=', 'stars.id')
                ->leftJoin('zones', 'stars.zone_id', '=', 'zones.id')
                ->where('planets.is_life_present', 1)
                ->where('zones.id', $request->zone)
                ->orderBy('zones.id', 'asc')
                ->get();


        return $row;

    }



}