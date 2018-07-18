<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Redirect;

class AllVideosController extends Controller
{
    public function index()
    {

        return view('all-videos.index');

    }

    public function show($id, $slug = '')
    {

        $video = Video::where('id', $id)->first();

        $this->requireSlug($video, $slug);

        $videoWarning = 'video-warning';



        return view('all-videos.show', compact('video', 'videoWarning'));

    }


    private function requireSlug($video, $slug)
    {

        if ($video->slug !== $slug) {

            return Redirect::route('all-videos.show', ['id' => $video->id,
                                                       'slug' => $video->slug], 301);
        }

    }

}
