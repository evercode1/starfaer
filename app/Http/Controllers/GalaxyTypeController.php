<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use App\GalaxyType;
use Illuminate\Support\Facades\Redirect;

class GalaxyTypeController extends Controller
{

    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('galaxytypes');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('galaxy-type.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

           $universes = Universe::all();


           return view('galaxy-type.create', compact('universes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'name' => 'required|unique:galaxy_types|string|max:100',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required',

        ]);

        $imageName = $this->formatString($request->get('name'));


        $slug = str_slug($request->name, "-");

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $galaxyType = GalaxyType::create(['name' => $request->name,
                                          'slug' => $slug,
                                          'is_active' => $request->is_active,
                                          'is_featured' => $request->is_featured,
                                          'universe_id' => $request->universe_id,
                                          'description' => $request->body,
                                          'image_name' => $imageName,
                                          'image_extension' => $image]);

        $galaxyType->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model


            $this->saveImageFiles($file, $galaxyType);

        }

        return Redirect::route('galaxy-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $galaxyType = GalaxyType::findOrFail($id);


        return view('galaxy-type.show', compact('galaxyType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(GalaxyType $galaxyType)
    {


            $universeId = $galaxyType->universe_id;

            $universeName = Universe::getUniverseName($galaxyType->universe_id);

            $universes = Universe::all();



        return view('galaxy-type.edit', compact('galaxyType' , 'universeId', 'universeName', 'universes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\$request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, GalaxyType $galaxyType)
    {

        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'name' => 'required|string|max:100|unique:galaxy_types,name,' .$galaxyType->id,
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required'

        ]);


        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $galaxyType);


        // if file, we have additional requirements before saving

        if ($this->newFileIsUploaded()) {

            $this->deleteExistingImages($galaxyType);

            $this->setNewFileExtension($request, $galaxyType);

        }

        $galaxyType->save();

        // check for file, if new file, overwrite existing file

        if ($this->newFileIsUploaded()){

            $file = $this->getUploadedFile();

            $this->saveImageFiles($file, $galaxyType);

        }

        return Redirect::route('galaxy-type.show', ['galaxyType' => $galaxyType, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $galaxyType = GalaxyType::findOrFail($id);

        $this->deleteExistingImages($galaxyType);

        GalaxyType::destroy($id);

        return Redirect::route('galaxy-type.index');

    }

    private function setNewFileExtension(Request $request, $book)
    {

        $book->image_extension = $request->file('image')->getClientOriginalExtension();

    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(Request $request, $galaxyType)
    {

        $galaxyType->name= $request->get('name');
        $galaxyType->is_featured = $request->get('is_featured');
        $galaxyType->is_active = $request->get('is_active');
        $galaxyType->description = $request->get('body');
        $galaxyType->image_name = $this->formatString($request->get('name'));

    }
}