<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\WorldTermType;


class WorldTermTypeController extends Controller
{
    use KebabHelper;

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

        return view('world-term-type.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {


           return view('world-term-type.create');

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

                    'name' => 'required|unique:world_term_types|string|max:100',
                    'is_active' => 'required|boolean',


                ]);


        $worldTermType = WorldTermType::create([ 'name' => $request->name,
                                                 'is_active' => $request->is_active]);

        $worldTermType->save();


        return Redirect::route('world-term-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $worldTermType = WorldTermType::findOrFail($id);

        return view('world-term-type.show', compact('worldTermType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $worldTermType = WorldTermType::findOrFail($id);


        return view('world-term-type.edit', compact('worldTermType'));

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


        $this->validate($request, [

            'name' => 'required|string|max:100|unique:world_term_types,name,' .$id,
            'is_active' => 'required|boolean'

            ]);

        $worldTermType = WorldTermType::findOrFail($id);



        $this->setUpdatedModelValues($request, $worldTermType);



        $worldTermType->save();



        return Redirect::route('world-term-type.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {




        WorldTermType::destroy($id);

        return Redirect::route('world-term-type.index');

    }



        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->is_active = $request->get('is_active');


    }

}