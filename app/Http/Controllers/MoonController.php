<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use App\Galaxy;
use Illuminate\Support\Facades\Redirect;
use App\Moon;


class MoonController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('moon');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('moon.index');

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


           return view('moon.create', compact('universes', 'galaxies'));

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

                    'name' => 'required|unique:moons|string|max:100',
                    'is_active' => 'required|boolean',
                    'galaxy_id' => 'required|integer',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',
                    'universe_id' => 'required',

                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $moon = Moon::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'galaxy_id' => $request->galaxy_id,
                                                                  'universe_id' => $request->universe_id,
                                                                  'description' => $request->body,
                                                                  'image_name' => $imageName,
                                                                  'image_extension' => $image]);

        $moon->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $moon);

        }

        return Redirect::route('moon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $moon = Moon::findOrFail($id);

        return view('moon.show', compact('moon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $moon = Moon::findOrFail($id);

        $universeId = $moon->universe_id;

        $universeName = $moon->universe->name;

        $universes = Universe::all();

        $galaxyId = $moon->galaxy->id;

        $galaxyName = $moon->galaxy->name;

        $galaxies = Galaxy::all();


        return view('moon.edit', compact('moon' ,
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

            'name' => 'required|string|max:100|unique:moons,name,' .$id,
            'is_active' => 'required|boolean',
            'galaxy_id' => 'required|integer',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required'

            ]);

        $moon = Moon::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $moon, $slug);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($moon);

                    $this->setNewFileExtension($request, $moon);

                }

        $moon->save();


            // check for file, if new file, overwrite existing file

            if ($this->newFileIsUploaded()){

                $file = $this->getUploadedFile();

                $this->saveImageFiles($file, $moon);

            }



        return Redirect::route('moon.show', ['moon' => $moon, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $moon = Moon::findOrFail($id);

        $this->deleteExistingImages($moon);

        Moon::destroy($id);

        return Redirect::route('moon.index');

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
        $modelInstance->galaxy_id = $request->get('galaxy_id');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');
        $modelInstance->universe_id = $request->get('universe_id');
        $modelInstance->image_name = $this->formatString($request->get('name'));

    }

}