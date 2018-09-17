<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use App\Galaxy;
use Illuminate\Support\Facades\Redirect;
use App\Moon;
use App\Atmosphere;
use App\SurfaceType;
use App\Planet;


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

           $surfaceTypes = SurfaceType::all();

           $atmospheres = Atmosphere::all();


           return view('moon.create', compact('universes',
                                              'galaxies',
                                              'surfaceTypes',
                                              'atmospheres'));

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
                    'planet_name' => 'required|string',
                    'is_active' => 'required|boolean',
                    'surface_type_id' => 'required|integer',
                    'atmosphere_id' => 'required|integer',
                    'mass' => 'required|integer',
                    'orbital_position' => 'required|integer',
                    'galaxy_id' => 'required|integer',
                    'universe_id' => 'required|integer',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',


                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $moon = Moon::create([ 'name' => $request->name,
                               'slug' => $slug,
                               'is_active' => $request->is_active,
                               'planet_id' => $this->getPlanetId($request->planet_name),
                               'surface_type_id' => $request->surface_type_id,
                               'atmosphere_id' => $request->atmosphere_id,
                               'mass' => $request->mass,
                               'orbital_position' => $request->orbital_position,
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

        // update moon count on planet

        $planet = Planet::where('id', $moon->planet_id)->first();

        $count = Moon::where('planet_id', $planet->id)
            ->orderBy('orbital_position', 'asc')
            ->count();

        $planet->update(['moon_count' => $count]);

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

        $atmosphereId = $moon->atmosphere->id;

        $atmosphereName = $moon->atmosphere->name;

        $atmospheres = Atmosphere::all();

        $surfaceTypeId = $moon->surfaceType->id;

        $surfaceTypeName = $moon->surfaceType->name;

        $surfaceTypes = SurfaceType::all();


        return view('moon.edit', compact('moon' ,
                                         'universeId',
                                         'universeName',
                                         'universes',
                                         'galaxyId',
                                         'galaxyName',
                                         'galaxies',
                                         'atmosphereId',
                                         'atmosphereName',
                                         'atmospheres',
                                         'surfaceTypeId',
                                         'surfaceTypeName',
                                         'surfaceTypes'));

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
            'planet_name' => 'required|string',
            'is_active' => 'required|boolean',
            'surface_type_id' => 'required|integer',
            'atmosphere_id' => 'required|integer',
            'mass' => 'required|integer',
            'orbital_position' => 'required|integer',
            'galaxy_id' => 'required|integer',
            'universe_id' => 'required|integer',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000'

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
        $modelInstance->planet_id = $this->getPlanetId($request->get('planet_name'));
        $modelInstance->surface_type_id = $request->get('surface_type_id');
        $modelInstance->atmosphere_id = $request->get('atmosphere_id');
        $modelInstance->orbital_position = $request->get('orbital_position');
        $modelInstance->mass = $request->get('mass');
        $modelInstance->galaxy_id = $request->get('galaxy_id');
        $modelInstance->universe_id = $request->get('universe_id');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');
        $modelInstance->image_name = $this->formatString($request->get('name'));

    }

    private function getPlanetId($name)
    {

        $planet = Planet::where('name', $name)->first();

        return $planet->id;


    }

}