<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Queries\GridQueries\ClosedContactQuery;
use App\Queries\GridQueries\ContactQuery;
use App\Queries\GridQueries\ContactTopicQuery;
use App\Queries\GridQueries\ContentQuery;
use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\OpenContactQuery;
use App\Queries\GridQueries\UserQuery;


class ApiController extends Controller
{

    public function closedContactData(Request $request)
    {

        return GridQuery::sendData($request, new ClosedContactQuery);

    }

    public function contactData(Request $request)
    {

        return GridQuery::sendData($request, new ContactQuery);


    }

    public function contactTopicData(Request $request)
    {

        return GridQuery::sendData($request, new ContactTopicQuery);

    }

    public function contentData(Request $request)
    {

        return GridQuery::sendData($request, new ContentQuery);

    }

    public function openContactData(Request $request)
    {

        return GridQuery::sendData($request, new OpenContactQuery);

    }

    public function userData(Request $request)
    {

        return GridQuery::sendData($request, new UserQuery);

    }
}
