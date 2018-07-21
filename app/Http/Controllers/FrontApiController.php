<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Queries\GridQueries\GridQuery;

class FrontApiController extends Controller
{

    // Begin Galaxy Api All Models Method

    public function allGalaxiesData(Request $request)
    {

        return GridQuery::sendData($request, 'AllGalaxiesQuery');

    }

    // End Galaxy Api All Models Method



    



    

}