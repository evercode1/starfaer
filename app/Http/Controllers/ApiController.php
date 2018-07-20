<?php

namespace App\Http\Controllers;

use App\Queries\AllBooksQuery;
use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\Video;
use App\Queries\GridQueries\VideoLevelGridQuery;
use App\Queries\VideoListQuery;
use App\Queries\VideosByCategoryListQuery;
use App\Queries\VideosByLevelListQuery;
use App\Queries\GridQueries\VideoCategoryGridQuery;
use App\Queries\CategoryListQuery;
use App\Queries\AlarmQuery;
use App\Contact;
use App\Queries\ArchivesQuery;
use App\Queries\ArticleListQuery;
use App\Queries\AlarmAdminQuery;


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

        return GridQuery::sendData($request, 'AllArticlesQuery');

    }

    public function allBooksData()
    {

        return AllBooksQuery::sendData();

    }

    public function allUniversesData(Request $request)
    {

        return GridQuery::sendData($request, 'UniverseQuery');

    }

    public function allVideoData(Request $request)
    {

        return GridQuery::sendData($request, 'VideoQuery');

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

        return GridQuery::sendData($request, 'BookQuery');

    }

    public function categoryData(Request $request)
    {

        return GridQuery::sendData($request, 'CategoryQuery');

    }

    public function categoryList()
    {

        return CategoryListQuery::sendData();

    }

    public function closedContactData(Request $request)
    {

        return GridQuery::sendData($request, 'ClosedContactQuery');

    }

    public function contactData(Request $request)
    {

        return GridQuery::sendData($request, 'ContactQuery');

    }

    public function contactTopicData(Request $request)
    {

        return GridQuery::sendData($request, 'ContactTopicQuery');

    }

    public function contentData(Request $request)
    {

        return GridQuery::sendData($request, 'ContentQuery');

    }

    public function levelData(Request $request)
    {

        return GridQuery::sendData($request, 'LevelQuery');

    }

    public function openContactData(Request $request)
    {

        return GridQuery::sendData($request, 'OpenContactQuery');

    }

    public function postData(Request $request)
    {

        return GridQuery::sendData($request, 'PostQuery');

    }

    public function totalVideos()
    {

        return Video::all()->count();

    }

    public function universeData(Request $request)
    {

        return GridQuery::sendData($request, 'UniverseQuery');

    }

    public function userData(Request $request)
    {

        return GridQuery::sendData($request, 'UserQuery');

    }

    public function videosByCategoryData(Request $request)
    {

        return VideoCategoryGridQuery::sendData($request,  'VideoByCategoryQuery');

    }

    public function videosByCategoryListData()
    {

        return VideosByCategoryListQuery::sendData();

    }

    public function videosByLevelData(Request $request)
    {

        return VideoLevelGridQuery::sendData($request,  'VideoByLevelQuery');

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

        return GridQuery::sendData($request, 'VideoQuery');

    }
}
