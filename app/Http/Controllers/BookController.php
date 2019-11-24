<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Redirect;
use App\UtilityTraits\ManagesImages;

use Carbon\Carbon;

class BookController extends Controller
{

    use ManagesImages, KebabHelper;


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

        $this->setImageDefaultsFromConfig('books');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('book.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('book.create');

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

            'title' => 'required|unique:books|string|max:100',
            'series_name' => 'required|string|max:150',
            'url' => 'required|unique:books|string|max:150',
            'author' => 'required|string|max:100',
            'number' => 'required|integer|between:1,100',
            'is_featured' => 'required|boolean',
            'is_active' => 'required|boolean',
            'published_at' => 'date',

        ]);



        $date = new Carbon('Jul 31, 2018');

        $publishedAt = $date->toDateString();



        $book = Book::create(['title' => $request->title,
                              'series_name' => $request->series_name,
                              'url'   => $request->url,
                              'number'   => $request->number,
                              'author' => $request->author,
                              'is_featured' => $request->is_featured,
                              'is_active' => $request->is_active,
                              'published_at' => $publishedAt,
                              'image_name'        => $this->formatString($request->get('title')),
                              'image_extension'   => 'jpg'

        ]);

        $book->save();

        // get instance of file

        // $file = $this->getUploadedFile();

        // pass in the file and the model

        // $this->saveImageFiles($file, $book);



        return Redirect::route('book.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Book $book)
    {

        return view('book.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Book $book)
    {


        $this->validate($request, [

            'title' => 'required|string|max:100|unique:books,title,' .$book->id,
            'series_name' => 'required|string|max:150',
            'url' => 'required|string|max:150|unique:books,url,' .$book->id,
            'author' => 'required|string|max:100',
            'number' => 'required|integer|between:1,100',
            'is_featured' => 'required|boolean',
            'is_active' => 'required|boolean',
            'published_at' => 'date'


        ]);


        $this->setUpdatedModelValues($request, $book);


        // if file, we have additional requirements before saving

        if ($this->newFileIsUploaded()) {

            $this->deleteExistingImages($book);

            $this->setNewFileExtension($request, $book);

        }

        $book->save();

        // check for file, if new file, overwrite existing file

        if ($this->newFileIsUploaded()){

            $file = $this->getUploadedFile();

            $this->saveImageFiles($file, $book);

        }


        return Redirect::route('book.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $book = Book::findOrFail($id);

        $this->deleteExistingImages($book);

        Book::destroy($id);

        return Redirect::route('book.index');

    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setNewFileExtension(Request $request, $book)
    {

        $book->image_extension = $request->file('image')->getClientOriginalExtension();

    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(Request $request, $book)
    {

        $book->title = $request->get('title');
        $book->series_name = $request->get('series_name');
        $book->url = $request->get('url');
        $book->author = $request->get('author');
        $book->number = $request->get('number');
        $book->is_featured = $request->get('is_featured');
        $book->is_active = $request->get('is_active');
        $book->published_at = $request->get('published_at');
        $book->image_name = $this->formatString($request->get('title'));

    }


}

