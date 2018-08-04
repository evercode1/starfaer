<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use Illuminate\Support\Facades\Redirect;
use App\PlanetType;
use App\Galaxy;


class PlanetTypeController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('planettype');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('planet-type.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

           $universes = Universe::all();

           $galaxies = Galaxy::all();


           return view('planet-type.create', compact('universes', 'galaxies'));

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

                    'name' => 'required|unique:planet_types|string|max:100',
                    'is_active' => 'required|boolean',
                    'wiki_url' => 'required|string',
                    'galaxy_id' => 'required|integer',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',
                    'universe_id' => 'required|integer',

                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $planetType = PlanetType::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'wiki_url' => $request->wiki_url,
                                                                  'galaxy_id' => $request->galaxy_id,
                                                                  'universe_id' => $request->universe_id,
                                                                  'description' => $request->body,
                                                                  'image_name' => $imageName,
                                                                  'image_extension' => $image]);

        $planetType->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $planetType);

        }

        return Redirect::route('planet-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $planetType = PlanetType::findOrFail($id);

        return view('planet-type.show', compact('planetType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $planetType = PlanetType::findOrFail($id);

        $universeId = $planetType->universe_id;

        $universeName = $planetType->universe->name;

        $universes = Universe::all();

        $galaxyId = $planetType->galaxy->id;

        $galaxyName = $planetType->galaxy->name;

        $galaxies = Galaxy::all();


        return view('planet-type.edit', compact('planetType' ,
                                                'universeId',
                                                'universeName',
                                                'universes',
                                                'galaxyId',
                                                'galaxyName',
                                                'galaxies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'name' => 'required|string|max:100|unique:planet_types,name,' .$id,
            'is_active' => 'required|boolean',
            'wiki_url' => 'required|string',
            'galaxy_id' => 'required|integer',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required'

            ]);

        $planetType = PlanetType::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $planetType, $slug);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($planetType);

                    $this->setNewFileExtension($request, $planetType);

                }

        $planetType->save();


            // check for file, if new file, overwrite existing file

            if ($this->newFileIsUploaded()){

                $file = $this->getUploadedFile();

                $this->saveImageFiles($file, $planetType);

            }



        return Redirect::route('planet-type.show', ['planetType' => $planetType, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $planetType = PlanetType::findOrFail($id);

        $this->deleteExistingImages($planetType);

        PlanetType::destroy($id);

        return Redirect::route('planet-type.index');

    }

    private function setNewFileExtension(Request $request, $modelInstance)
    {

         $modelInstance->image_extension = $request->file('image')->getClientOriginalExtension();

    }

        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance, $slug)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->slug = $slug;
        $modelInstance->wiki_url = $request->get('wiki_url');
        $modelInstance->galaxy_id = $request->get('galaxy_id');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');
        $modelInstance->universe_id = $request->get('universe_id');
        $modelInstance->image_name = $this->formatString($request->get('name'));

    }

}