<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use Illuminate\Support\Facades\Redirect;
use App\ZoneType;


class ZoneTypeController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('zonetype');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('zone-type.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $universes = Universe::all();


        return view('zone-type.create', compact('universes'));

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

                    'name' => 'required|unique:zone_types|string|max:100',
                    'is_active' => 'required|boolean',
                    'is_featured' => 'required|boolean',
                    'weight' => 'required|integer|between:1,100',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',
                    'universe_id' => 'required',

                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $zoneType = ZoneType::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'is_featured' => $request->is_featured,
                                                                  'weight' => $request->weight,
                                                                  'universe_id' => $request->universe_id,
                                                                  'description' => $request->body,
                                                                  'image_name' => $imageName,
                                                                  'image_extension' => $image]);

        $zoneType->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $zoneType);

        }

        return Redirect::route('zone-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $zoneType = ZoneType::findOrFail($id);

        return view('zone-type.show', compact('zoneType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

            $zoneType = ZoneType::findOrFail($id);

            $universeId = $zoneType->universe_id;

            $universeName = $zoneType->universe->name;

            $universes = Universe::all();




        return view('zone-type.edit', compact('zoneType' , 'universeId', 'universeName', 'universes'));

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

            'name' => 'required|string|max:100|unique:zone_types,name,' .$id,
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'weight' => 'required|integer|between:1,100',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required'

            ]);

        $zoneType = ZoneType::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $zoneType);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($zoneType);

                    $this->setNewFileExtension($request, $zoneType);

                }

        $zoneType->save();


                // check for file, if new file, overwrite existing file

                if ($this->newFileIsUploaded()){

                    $file = $this->getUploadedFile();

                    $this->saveImageFiles($file, $zoneType);

                }



        return Redirect::route('zone-type.show', ['zoneType' => $zoneType, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $zoneType = ZoneType::findOrFail($id);

        $this->deleteExistingImages($zoneType);

        ZoneType::destroy($id);

        return Redirect::route('zone-type.index');

    }

    private function setNewFileExtension(Request $request, $modelInstance)
    {

         $modelInstance->image_extension = $request->file('image')->getClientOriginalExtension();

    }

        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

        private function setUpdatedModelValues(Request $request, $modelInstance)
        {

            $modelInstance->name= $request->get('name');
            $modelInstance->weight = $request->get('weight');
            $modelInstance->is_featured = $request->get('is_featured');
            $modelInstance->is_active = $request->get('is_active');
            $modelInstance->description = $request->get('body');
            $modelInstance->universe_id = $request->get('universe_id');
            $modelInstance->image_name = $this->formatString($request->get('name'));

        }

}