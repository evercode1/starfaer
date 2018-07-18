<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Redirect;
use App\Level;

class VideoController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('video.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $categories = Category::all();

        $levels = Level::all();

        return view('video.create', compact('categories', 'levels'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [

            'title' => 'required|unique:videos|string|max:100',
            'url' => 'required|unique:videos|string|max:100',
            'author' => 'string',
            'description' => 'string|max:400',
            'embed_code' => 'string|max:1200',
            'category_id' => 'required|numeric',
            'level_id' => 'required|numeric',
            'is_featured' => 'required|boolean',

        ]);

        $slug = str_slug($request->title, "-");

        $video = Video::create(['title' => $request->title,
                                              'url'   => $request->url,
                                              'slug' => $slug,
                                              'author' => $request->author,
                                              'description' => $request->description,
                                              'embed_code' => $request->embed_code,
                                              'category_id' => $request->category_id,
                                              'level_id' => $request->level_id,
                                              'is_featured' => $request->is_featured
        ]);

        $video->save();

        return Redirect::route('video.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Video $video)
    {

        $categoryId = $video->category_id;

        $categoryName = Category::getCategoryName($video->category_id);

        $categories = Category::all();

        $levelId = $video->level_id;

        $levelName = $video->getLevelName($video);

        $levels = Level::all();

        return view('video.edit', compact('video',
                                          'categoryId',
                                          'categoryName',
                                          'categories',
                                          'levels',
                                          'levelId',
                                          'levelName'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Video $video)
    {

        $this->validate($request, [

            'title' => 'required|string|max:40|unique:videos,title,' .$video->id,
            'url' => 'required|string|max:100|unique:videos,url,' .$video->id,
            'author' => 'string',
            'description' => 'string|max:400',
            'embed_code' => 'string|max:1200',
            'category_id' => 'required|numeric',
            'level_id' => 'required|numeric',
            'is_featured' => 'required|boolean',

        ]);

        $slug = str_slug($request->title, "-");


        $video->update(['title' => $request->title,
                        'url'   => $request->url,
                        'slug' => $slug,
                        'author' => $request->author,
                        'description' => $request->description,
                        'embed_code' => $request->embed_code,
                        'category_id' => $request->category_id,
                        'level_id' => $request->level_id,
                        'is_featured' => $request->is_featured
        ]);


        return Redirect::route('video.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Video::destroy($id);

        return Redirect::route('video.index');

    }
}

