<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\UserQuery;


class ApiController extends Controller
{
    public function userData(Request $request)
    {

        return GridQuery::sendData($request, new UserQuery);

    }
}
