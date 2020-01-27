<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidPlanetNameException;
use App\UtilityTraits\KebabHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\WorldTerm;
use App\WorldTermType;
use App\Planet;
use App\Book;


class WorldTermController extends Controller
{
    use KebabHelper;

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

        return view('world-term.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $worldTermTypes = WorldTermType::orderBy('name', 'asc')->get();

        $books = Book::orderBy('title', 'asc')->get();


           return view('world-term.create', compact('worldTermTypes', 'books'));

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

                    'name' => 'required|unique:world_terms|string|max:100',
                    'is_active' => 'required|boolean',
                    'planet' => 'required|alpha-dash',
                    'body' => 'required|string|max:1000',
                    'world_term_type_id' => 'required|integer',
                    'book_id' => 'required|integer',

                ]);



        $slug = str_slug($request->name, "-");

        $planet = $this->formatPlanet($request->planet);


        $worldTerm = WorldTerm::create([ 'name' => $request->name,
                                         'slug' => $slug,
                                         'world_term_type_id' => $request->world_term_type_id,
                                         'book_id' => $request->book_id,
                                         'is_active' => $request->is_active,
                                         'planet_id' => $planet,
                                         'description' => $request->body]);

        $worldTerm->save();



        return Redirect::route('world-term.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $worldTerm = WorldTerm::findOrFail($id);

        $planetName = $this->findPlanetName($worldTerm->planet_id);

        $planetId = $worldTerm->planet_id;

        $book = Book::findOrFail($worldTerm->book_id);

        $bookTitle = $book->title;

        $bookId = $worldTerm->book_id;

        return view('world-term.show', compact('worldTerm', 'planetName', 'planetId', 'bookTitle', 'bookId'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $worldTerm = WorldTerm::findOrFail($id);

        $planet = $this->findPlanetName($worldTerm->planet_id);

        $types = WorldTermType::orderBy('name', 'asc')->get();

        $oldType = $worldTerm->WorldTermType->name;

        $oldTypeId = $worldTerm->WorldTermType->id;

        $books = Book::orderBy('name', 'asc')->get();

        $book = Book::findOrFail($worldTerm->book_id);

        $oldBookId = $worldTerm->book_id;

        $oldBookTitle = $book->title;


        return view('world-term.edit', compact('worldTerm', 'planet', 'types',
                                               'oldType', 'oldTypeId', 'books',
                                               'oldBookId', 'oldBookTitle'));

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

            'name' => 'required|string|max:100|unique:world_terms,name,' .$id,
            'is_active' => 'required|boolean',
            'planet' => 'required|alpha-dash',
            'body' => 'required|string|max:1000',
            'world_term_type_id' => 'required|integer',
            'book_id' => 'required|integer'

            ]);

        $worldTerm = WorldTerm::findOrFail($id);

        $planet = $this->formatPlanet($request->planet);

        $slug = str_slug($request->name, "-");

        $this->setUpdatedModelValues($request, $worldTerm, $planet, $slug);



        $worldTerm->save();


        return Redirect::route('world-term.show', ['worldTerm' => $worldTerm, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        WorldTerm::destroy($id);

        return Redirect::route('world-term.index');

    }


        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance, $planet, $slug)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->slug = $slug;
        $modelInstance->world_term_type_id = $request->get('world_term_type_id');
        $modelInstance->book_id = $request->get('book_id');
        $modelInstance->planet_id = $planet;
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');



    }

    private function formatPlanet($name)
    {

        $formattedName = strtolower($name);


        $planet = Planet::where('name', $formattedName)->first();


        $planet = $planet->id;



        if($planet){

            return $planet;
        }

        throw new InvalidPlanetNameException();



    }

    private function findPlanetName($id)
    {

        $planet = Planet::findOrFail($id);


        return ucwords($planet->name);



    }

}