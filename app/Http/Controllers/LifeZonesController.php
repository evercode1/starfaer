<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use Illuminate\Support\Facades\DB;
use App\Queries\LifeZonesQuery;


class LifeZonesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

    }

    public function index()
    {

        $zones = DB::table('planets')
            ->select('planets.name as Planet',
                'zones.name as Zone',
                'zones.id as Id',
                DB::raw('COUNT(*) as Planets'))
            ->leftJoin('stars', 'planets.star_id', '=', 'stars.id')
            ->leftJoin('zones', 'stars.zone_id', '=', 'zones.id')
            ->where('planets.is_life_present', 1)
            ->orderBy('zones.id', 'asc')
            ->groupBy('zones.id')
            ->get();



        return view('life-zones.index', compact('zones'));


    }

    public function show(Request $request)
    {

        $planets = LifeZonesQuery::sendData($request);

        $zone = $request->zone;

        return view('life-zones.show', compact('planets', 'zone'));

    }



}
