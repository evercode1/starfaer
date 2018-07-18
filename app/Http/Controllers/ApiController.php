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
use App\Video;
use App\Queries\GridQueries\VideoByCategoryQuery;
use App\Queries\GridQueries\VideoByLevelQuery;
use App\Queries\VideoCountQuery;
use App\Queries\GridQueries\VideoLevelGridQuery;
use App\Queries\VideoListQuery;
use App\Queries\VideosByCategoryListQuery;
use App\Queries\VideosByLevelListQuery;
use App\Queries\GridQueries\VideoCategoryGridQuery;
use App\Queries\GridQueries\VideoQuery;
use App\Queries\GridQueries\CategoryQuery;
use App\Queries\CategoryListQuery;
use App\Queries\GridQueries\LevelQuery;

class ApiController extends Controller
{

    public function allVideoData(Request $request)
    {

        return GridQuery::sendData($request, new VideoQuery);

    }

    public function categoryData(Request $request)
    {

        return GridQuery::sendData($request, new CategoryQuery);

    }

    public function categoryList()
    {

        return CategoryListQuery::sendData();

    }

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

    public function levelData(Request $request)
    {

        return GridQuery::sendData($request, new LevelQuery);

    }

    public function openContactData(Request $request)
    {

        return GridQuery::sendData($request, new OpenContactQuery);

    }

    public function totalVideos()
    {


        return Video::all()->count();


    }

    public function userData(Request $request)
    {

        return GridQuery::sendData($request, new UserQuery);

    }

    public function videosByCategoryData(Request $request)
    {


        return VideoCategoryGridQuery::sendData($request,  new VideoByCategoryQuery);

    }

    public function videosByCategoryListData()
    {


        return VideosByCategoryListQuery::sendData();

    }

    public function videosByLevelData(Request $request)
    {


        return VideoLevelGridQuery::sendData($request,  new VideoByLevelQuery);

    }

    public function videosByLevelListData(Request $request)
    {


        return VideosByLevelListQuery::sendData();

    }


    public function videoListData()
    {

        return VideoListQuery::sendData();


    }

    public function videoData(Request $request)
    {

        return GridQuery::sendData($request, new VideoQuery);


    }
}
