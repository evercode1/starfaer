<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use App\Universe;
use App\Galaxy;
use Illuminate\Support\Facades\Redirect;
use App\Planet;
use App\PlanetType;
use App\Atmosphere;
use App\Star;


class PlanetController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('planet');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('planet.index');

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

           $planetTypes = PlanetType::all();

           $atmospheres = Atmosphere::all();

           $stars = Star::all();


           return view('planet.create', compact('universes',
                                                'galaxies',
                                                'planetTypes',
                                                'stars',
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

                    'name' => 'required|unique:planets|string|max:100',
                    'universe_id' => 'required',
                    'galaxy_id' => 'required|integer',
                    'planet_type_id' => 'required|integer',
                    'planet_detail_id' => 'required|integer',
                    'star_id' => 'required|integer',
                    'atmosphere_id' => 'required|integer',
                    'mass' => 'required|integer',
                    'atmospheric_density' => 'required|integer',
                    'planet_number_from_star' => 'required|integer',
                    'moon_count' => 'required|integer',
                    'ocean_count' => 'required|integer',
                    'continent_count' => 'required|integer',
                    'is_life_present' => 'required|boolean',
                    'is_in_goldilocks_zone' => 'required|boolean',
                    'is_ringed' => 'required|boolean',
                    'is_active' => 'required|boolean',
                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',



                ]);

        $slug = str_slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $planet = Planet::create([ 'name' => $request->name,
                                   'slug' => $slug,
                                   'galaxy_id' => $request->galaxy_id,
                                   'universe_id' => $request->universe_id,
                                   'planet_type_id' => $request->planet_type_id,
                                   'atmosphere_id' => $request->atmosphere_id,
                                   'planet_detail_id' => $request->planet_detail_id,
                                   'star_id' => $request->star_id,
                                   'mass' => $request->mass,
                                   'atmospheric_density' => $request->atmospheric_density,
                                   'planet_number_from_star' => $request->planet_number_from_star,
                                   'moon_count' => $request->moon_count,
                                   'ocean_count' => $request->ocean_count,
                                   'continent_count' => $request->continent_count,
                                   'is_life_present' => $request->is_life_present,
                                   'is_in_goldilocks_zone' => $request->is_in_goldilocks_zone,
                                   'is_ringed' => $request->is_ringed,
                                   'is_active' => $request->is_active,
                                   'description' => $request->body,
                                   'image_name' => $imageName,
                                   'image_extension' => $image]);

        $planet->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $planet);

        }

        return Redirect::route('planet.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $planet = Planet::findOrFail($id);

        return view('planet.show', compact('planet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $planet = Planet::findOrFail($id);

        $universeId = $planet->universe_id;

        $universeName = $planet->universe->name;

        $universes = Universe::all();

        $galaxyId = $planet->galaxy->id;

        $galaxyName = $planet->galaxy->name;

        $galaxies = Galaxy::all();

        $planetTypes = PlanetType::all();

        $planetTypeId = $planet->planetType->id;

        $planetTypeName = $planet->planetType->name;

        $atmospheres = Atmosphere::all();

        $atmosphereId = $planet->atmosphere->id;

        $atmosphereName = $planet->atmosphere->name;

        $stars = Star::all();

        $starId = $planet->star->id;

        $starName = $planet->star->name;


        return view('planet.edit', compact('planet' ,
                                           'universeId',
                                           'universeName',
                                           'universes',
                                           'galaxyId',
                                           'galaxyName',
                                           'galaxies',
                                           'planetTypes',
                                           'planetTypeId',
                                           'planetTypeName',
                                           'atmospheres',
                                           'atmosphereId',
                                           'atmosphereName',
                                           'stars',
                                           'starId',
                                           'starName'));

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

            'name' => 'required|string|max:100|unique:planets,name,' .$id,
            'universe_id' => 'required',
            'galaxy_id' => 'required|integer',
            'planet_type_id' => 'required|integer',
            'planet_detail_id' => 'required|integer',
            'star_id' => 'required|integer',
            'atmosphere_id' => 'required|integer',
            'mass' => 'required|integer',
            'atmospheric_density' => 'required|integer',
            'planet_number_from_star' => 'required|integer',
            'moon_count' => 'required|integer',
            'ocean_count' => 'required|integer',
            'continent_count' => 'required|integer',
            'is_life_present' => 'required|boolean',
            'is_in_goldilocks_zone' => 'required|boolean',
            'is_ringed' => 'required|boolean',
            'is_active' => 'required|boolean',
            'body' => 'required|string|max:1000',
            'image' => 'max:1000'


            ]);

        $planet = Planet::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $planet, $slug);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($planet);

                    $this->setNewFileExtension($request, $planet);

                }

        $planet->save();


            // check for file, if new file, overwrite existing file

            if ($this->newFileIsUploaded()){

                $file = $this->getUploadedFile();

                $this->saveImageFiles($file, $planet);

            }



        return Redirect::route('planet.show', ['planet' => $planet, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $planet = Planet::findOrFail($id);

        $this->deleteExistingImages($planet);

        Planet::destroy($id);

        return Redirect::route('planet.index');

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
        $modelInstance->universe_id = $request->get('universe_id');
        $modelInstance->galaxy_id = $request->get('galaxy_id');
        $modelInstance->planet_type_id = $request->get('planet_type_id');
        $modelInstance->atmosphere_id = $request->get('atmosphere_id');
        $modelInstance->star_id = $request->get('star_id');
        $modelInstance->planet_detail_id = $request->get('planet_detail_id');
        $modelInstance->mass = $request->get('mass');
        $modelInstance->atmospheric_density = $request->get('atmospheric_density');
        $modelInstance->planet_number_from_star = $request->get('planet_number_from_star');
        $modelInstance->moon_count = $request->get('moon_count');
        $modelInstance->ocean_count = $request->get('ocean_count');
        $modelInstance->continent_count = $request->get('continent_count');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->is_life_present = $request->get('is_life_present');
        $modelInstance->is_in_goldilocks_zone = $request->get('is_in_goldilocks_zone');
        $modelInstance->is_ringed = $request->get('is_ringed');
        $modelInstance->description = $request->get('body');
        $modelInstance->image_name = $this->formatString($request->get('name'));

    }

}