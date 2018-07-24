<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Queries\GridQueries\GridQuery;

class FrontApiController extends Controller
{

    // Begin StarType Api All Models Method

    public function allStarTypesData(Request $request)
    {

        return GridQuery::sendData($request, 'StarTypeQuery');

    }

    // End StarType Api All Models Method



    // Begin Zone Api All Models Method

    public function allZonesData(Request $request)
    {

        return GridQuery::sendData($request, 'ZoneQuery');

    }

    // End Zone Api All Models Method



    



    



    



    



    




    // Begin GalaxyType Api All Models Method

    public function allGalaxyTypesData(Request $request)
    {

        return GridQuery::sendData($request, 'GalaxyTypeQuery');

    }

    // End GalaxyType Api All Models Method



    // Begin Galaxy Api All Models Method

    public function allGalaxiesData(Request $request)
    {

        return GridQuery::sendData($request, 'AllGalaxiesQuery');

    }

    // End Galaxy Api All Models Method



    



    

}