<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UtilityTraits\Levels;
use App\Level;

class VideosByLevelController extends Controller
{



    public function index($id)
    {

        $levelName = $this->getLevelName($id);

        $levelId = $id;

        return view('videos-by-level.index', compact('levelName', 'levelId'));

    }

    public function getLevelName($id)
    {

        $name = Level::where('name', $id)->pluck('name')->first();

        return $name;

    }
}
