<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use Illuminate\Support\Facades\Redirect;
use App\Zone;
use App\ZoneType;


class ZoneController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('zone');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('zone.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $universes = Universe::all();

        $zoneTypes = ZoneType::all();


        return view('zone.create', compact('universes', 'zoneTypes'));

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

                    'name' => 'required|unique:zones|string|max:100',
                    'is_active' => 'required|boolean',
                    'is_featured' => 'required|boolean',
                    'coordinates' => 'required|integer|between:1,10000',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',
                    'universe_id' => 'required',
                    'zone_type_id' => 'required'

                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $zone = Zone::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'is_featured' => $request->is_featured,
                                                                  'coordinates' => $request->coordinates,
                                                                  'universe_id' => $request->universe_id,
                                                                  'zone_type_id' => $request->zone_type_id,
                                                                  'description' => $request->body,
                                                                  'image_name' => $imageName,
                                                                  'image_extension' => $image]);

        $zone->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $zone);

        }

        return Redirect::route('zone.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Zone $zone, $slug='')
    {

        if ($zone->slug !== $slug) {

            return Redirect::route('zone.show', ['id' => $zone->id,
                                                   'slug' => $zone->slug], 301);
        }

        return view('zone.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $zone = Zone::findOrFail($id);

        $universeId = $zone->universe_id;

        $universeName = $zone->universe->name;

        $universes = Universe::all();

        $zoneTypeId = $zone->zone_type_id;

        $zoneTypeName = $zone->zoneType->name;

        $zoneTypes = ZoneType::all();



        return view('zone.edit', compact('zone' ,
                                         'universeId',
                                         'universeName',
                                         'universes',
                                         'zoneTypeId',
                                         'zoneTypeName',
                                         'zoneTypes'));

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

            'name' => 'required|string|max:100|unique:zones,name,' .$id,
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'coordinates' => 'required|integer|between:1,10000',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000',
            'universe_id' => 'required',
            'zone_type_id' => 'required'

            ]);

        $zone = Zone::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $zone);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($zone);

                    $this->setNewFileExtension($request, $zone);

                }

        $zone->save();


                // check for file, if new file, overwrite existing file

                if ($this->newFileIsUploaded()){

                    $file = $this->getUploadedFile();

                    $this->saveImageFiles($file, $zone);

                }



        return Redirect::route('zone.show', ['zone' => $zone, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $zone = Zone::findOrFail($id);

        $this->deleteExistingImages($zone);

        Zone::destroy($id);

        return Redirect::route('zone.index');

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
            $modelInstance->coordinates = $request->get('coordinates');
            $modelInstance->is_featured = $request->get('is_featured');
            $modelInstance->is_active = $request->get('is_active');
            $modelInstance->description = $request->get('body');
            $modelInstance->universe_id = $request->get('universe_id');
            $modelInstance->zone_type_id = $request->get('zone_type_id');
            $modelInstance->image_name = $this->formatString($request->get('name'));

        }

}