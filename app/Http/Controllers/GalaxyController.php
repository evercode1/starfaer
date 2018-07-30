<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Galaxy;
use Illuminate\Support\Facades\Redirect;
use App\Universe;
use App\GalaxyType;

class GalaxyController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('galaxy.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $universes = Universe::all();

        return view('galaxy.create', compact('universes', 'galaxyTypes'));

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

            'name' => 'required|unique:galaxies|string|max:100',
            'is_active' => 'required|boolean',
            'body' => 'required|string',
            'universe_id' => 'required',
            'galaxy_type_id' => 'required'

        ]);

        $slug = str_slug($request->name, "-");

        $galaxy = Galaxy::create(['name' => $request->name,
                                  'is_active' => $request->is_active,
                                  'slug' => $slug,
                                  'description' => $request->body,
                                  'universe_id' => $request->universe_id,
                                  'galaxy_type_id' => $request->galaxy_type_id]);
        $galaxy->save();

        return Redirect::route('galaxy.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Galaxy $galaxy, $slug='')
    {


        if ($galaxy->slug !== $slug) {

            return Redirect::route('galaxy.show', ['id' => $galaxy->id,
                                                   'slug' => $galaxy->slug], 301);
        }


        return view('galaxy.show', compact('galaxy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $galaxy = Galaxy::findOrFail($id);

        $universeId = $galaxy->universe_id;

        $universeName = $galaxy->universe->name;

        $universes = Universe::all();

        return view('galaxy.edit', compact('galaxy', 'universeId', 'universeName', 'universes' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Galaxy $galaxy)
    {
        $this->validate($request, [

            'name' => 'required|string|max:100|unique:galaxies,name,' . $galaxy->id,
            'is_active' => 'required|boolean',
            'body' => 'required|string',
            'universe_id' => 'required',
            'galaxy_type_id' => 'required'

        ]);


        $slug = str_slug($request->name, "-");

        $galaxy->update(['name' => $request->name,
                         'slug' => $slug,
                         'is_active' => $request->is_active,
                         'description' => $request->body,
                         'universe_id' => $request->universe_id,
                         'galaxy_type_id' => $request->galaxy_type_id]);


        return redirect()->route('galaxy.show', [$galaxy, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Galaxy::destroy($id);

        return Redirect::route('galaxy.index');

    }
}