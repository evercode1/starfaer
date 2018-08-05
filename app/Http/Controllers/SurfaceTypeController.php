<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use App\Galaxy;
use Illuminate\Support\Facades\Redirect;
use App\SurfaceType;


class SurfaceTypeController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('surfacetype');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('surface-type.index');

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


           return view('surface-type.create', compact('universes', 'galaxies'));

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

                    'name' => 'required|unique:surface_types|string|max:100',
                    'is_active' => 'required|boolean',
                    'galaxy_id' => 'required|integer',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',
                    'universe_id' => 'required',

                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $surfaceType = SurfaceType::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'galaxy_id' => $request->galaxy_id,
                                                                  'universe_id' => $request->universe_id,
                                                                  'description' => $request->body,
                                                                  'image_name' => $imageName,
                                                                  'image_extension' => $image]);

        $surfaceType->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $surfaceType);

        }

        return Redirect::route('surface-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $surfaceType = SurfaceType::findOrFail($id);

        return view('surface-type.show', compact('surfaceType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $surfaceType = SurfaceType::findOrFail($id);

        $universeId = $surfaceType->universe_id;

        $universeName = $surfaceType->universe->name;

        $universes = Universe::all();

        $galaxyId = $surfaceType->galaxy->id;

        $galaxyName = $surfaceType->galaxy->name;

        $galaxies = Galaxy::all();


        return view('surface-type.edit', compact('surfaceType' ,
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

            'name' => 'required|string|max:100|unique:surface_types,name,' .$id,
            'is_active' => 'required|boolean',
            'galaxy_id' => 'required|integer',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required'

            ]);

        $surfaceType = SurfaceType::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $surfaceType, $slug);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($surfaceType);

                    $this->setNewFileExtension($request, $surfaceType);

                }

        $surfaceType->save();


            // check for file, if new file, overwrite existing file

            if ($this->newFileIsUploaded()){

                $file = $this->getUploadedFile();

                $this->saveImageFiles($file, $surfaceType);

            }



        return Redirect::route('surface-type.show', ['surfaceType' => $surfaceType, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $surfaceType = SurfaceType::findOrFail($id);

        $this->deleteExistingImages($surfaceType);

        SurfaceType::destroy($id);

        return Redirect::route('surface-type.index');

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