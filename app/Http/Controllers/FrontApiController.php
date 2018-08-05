<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Queries\GridQueries\GridQuery;

class FrontApiController extends Controller
{

    // Begin SurfaceType Api All Models Method

    public function allSurfaceTypesData(Request $request)
    {

        return GridQuery::sendData($request, 'SurfaceTypeQuery');

    }

    // End SurfaceType Api All Models Method



    // Begin Moon Api All Models Method

    public function allMoonsData(Request $request)
    {

        return GridQuery::sendData($request, 'MoonQuery');

    }

    // End Moon Api All Models Method



    // Begin Planet Api All Models Method

    public function allPlanetsData(Request $request)
    {

        return GridQuery::sendData($request, 'PlanetQuery');

    }

    // End Planet Api All Models Method



    // Begin Atmosphere Api All Models Method

    public function allAtmospheresData(Request $request)
    {

        return GridQuery::sendData($request, 'AtmosphereQuery');

    }

    // End Atmosphere Api All Models Method



    



    // Begin PlanetType Api All Models Method

    public function allPlanetTypesData(Request $request)
    {

        return GridQuery::sendData($request, 'PlanetTypeQuery');

    }

    // End PlanetType Api All Models Method



    // Begin Star Api All Models Method

    public function allStarsData(Request $request)
    {

        return GridQuery::sendData($request, 'StarQuery');

    }

    // End Star Api All Models Method



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