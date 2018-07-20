<?php

namespace App\Http\Controllers;

use App\Queries\AllBooksQuery;
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
use App\Queries\GridQueries\BookQuery;
use App\Queries\AlarmQuery;
use App\Contact;
use App\Queries\ArchivesQuery;
use App\Queries\ArticleListQuery;
use App\Queries\GridQueries\PostQuery;
use App\Queries\AlarmAdminQuery;
use App\Queries\GridQueries\AllArticlesQuery;
use App\Queries\GridQueries\UniverseQuery;

class ApiController extends Controller
{

    public function alarmData()
    {

        return AlarmQuery::sendData();


    }

    public function alarmDataAdmin()
    {

        return AlarmAdminQuery::sendData();


    }

    public function alarmSupportData()
    {

        $data = Contact::where('status_id', 1)->count();

        return json_encode($data);


    }

    public function allArticlesData(Request $request)
    {

        return GridQuery::sendData($request, new AllArticlesQuery);

    }

    public function allBooksData()
    {

        return AllBooksQuery::sendData();

    }

    public function allUniversesData(Request $request)
    {

        return GridQuery::sendData($request, new UniverseQuery);

    }

    public function allVideoData(Request $request)
    {

        return GridQuery::sendData($request, new VideoQuery);

    }

    public function archives()
    {

        return ArchivesQuery::sendData();

    }

    public function articleListData()
    {

        return ArticleListQuery::sendData();

    }

    public function bookData(Request $request)
    {

        return GridQuery::sendData($request, new BookQuery);

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

    public function postData(Request $request)
    {

        return GridQuery::sendData($request, new PostQuery);

    }

    public function totalVideos()
    {


        return Video::all()->count();


    }

    public function universeData(Request $request)
    {

        return GridQuery::sendData($request, new UniverseQuery);

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
