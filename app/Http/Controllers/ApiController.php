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

    public function allBooksData(Request $request)
    {

        return GridQuery::sendData($request, 'BookQuery');

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

    // Begin Atmosphere Api Data Grid Method

    public function atmosphereData(Request $request)
    {

        return GridQuery::sendData($request, 'AtmosphereQuery');

    }

    // End Atmosphere Api Data Grid Method

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

    // Begin GalaxyType Api Data Grid Method

    public function galaxyTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'GalaxyTypeQuery');

    }

    // End GalaxyType Api Data Grid Method



    // Begin Galaxy Api Data Grid Method

    public function galaxyData(Request $request)
    {

        return GridQuery::sendData($request, 'GalaxyQuery');

    }

    // End Galaxy Api Data Grid Method

    public function levelData(Request $request)
    {

        return GridQuery::sendData($request, 'LevelQuery');

    }

    // Begin Moon Api Data Grid Method

    public function moonData(Request $request)
    {

        return GridQuery::sendData($request, 'MoonQuery');

    }

    // End Moon Api Data Grid Method

    public function openContactData(Request $request)
    {

        return GridQuery::sendData($request, 'OpenContactQuery');

    }

    // Begin Planet Api Data Grid Method

    public function planetData(Request $request)
    {

        return GridQuery::sendData($request, 'PlanetQuery');

    }

    // End Planet Api Data Grid Method

    // Begin PlanetType Api Data Grid Method

    public function planetTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'PlanetTypeQuery');

    }

    // End PlanetType Api Data Grid Method

    public function postData(Request $request)
    {

        return GridQuery::sendData($request, 'PostQuery');

    }

    // Begin Star Api Data Grid Method

    public function starData(Request $request)
    {

        return GridQuery::sendData($request, 'StarQuery');

    }

    // End Star Api Data Grid Method

    // Begin StarType Api Data Grid Method

    public function starTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'StarTypeQuery');

    }

    // End StarType Api Data Grid Method

    // Begin SurfaceType Api Data Grid Method

    public function surfaceTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'SurfaceTypeQuery');

    }

    // End SurfaceType Api Data Grid Method

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

    // Begin WorldTerm Api Data Grid Method

    public function worldTermData(Request $request)
    {

        return GridQuery::sendData($request, 'WorldTermQuery');

    }

    // End WorldTerm Api Data Grid Method

    // Begin WorldTermType Api Data Grid Method

    public function worldTermTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'WorldTermTypeQuery');

    }

    // End WorldTermType Api Data Grid Method

    // Begin Zone Api Data Grid Method

    public function zoneData(Request $request)
    {

        return GridQuery::sendData($request, 'ZoneQuery');

    }

    // End Zone Api Data Grid Method


    // Begin ZoneType Api Data Grid Method

    public function zoneTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'ZoneTypeQuery');

    }

    // End ZoneType Api Data Grid Method
}
