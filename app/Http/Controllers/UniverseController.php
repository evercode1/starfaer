<?php

namespace App\Http\Controllers;

use App\Universe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UniverseController extends Controller
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

        return view('universe.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('universe.create');

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

            'name' => 'required|unique:levels|string|max:100',
            'author' => 'required|string|max:100',
            'body' => 'required|string'

        ]);

        $slug = str_slug($request->name, "-");



        $universe = Universe::create(['name' => $request->name,
                                      'author' => $request->author,
                                      'description' => $request->body,
                                      'slug' => $slug]);


        $universe->save();

        return Redirect::route('universe.index');

    }

    public function show(Universe $universe, $slug ='')
    {

        if ($universe->slug !== $slug) {

            return Redirect::route('universe.show', ['id' => $universe->id,
                                                     'slug' => $universe->slug], 301);
        }

        return view('universe.show' , compact('universe'));


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $universe = Universe::findOrFail($id);

        return view('universe.edit', compact('universe'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required|string|max:40|unique:levels,name,' .$id,
            'author' => 'required|string|max:100',
            'body' => 'required|string'

        ]);

        $universe = Universe::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $universe->update(['name' => $request->name,
                           'author' => $request->author,
                           'slug' => $slug,
                           'description' => $request->body]);


        return Redirect::route('universe.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Universe::destroy($id);

        return Redirect::route('universe.index');

    }
}
