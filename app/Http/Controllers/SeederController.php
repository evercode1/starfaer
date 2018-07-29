<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Utilities\CreateSeeds;
use App\Rules\NameIsAllowed;
use App\Exceptions\NameException;

class SeederController extends Controller
{
    public function create()
    {

        return view('seeder.create');

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => ['required', 'string', 'max:200', new NameIsAllowed()],
            'type' => 'required|string',
            'direction' => 'required|string',
            'word_length' => 'required|integer',
            'total_count' => 'required|integer',
            'vowels' => 'required|string',
            'consonants' => 'required|string',

        ]);


        $name = $request->name;
        $type = $request->type;
        $direction = $request->direction;
        $wordLength = $request->word_length;
        $totalCount = $request->total_count;
        $vowels= config('vowels.'. $request->vowels);
        $consonants = config('consonants.' . $request->consonants);


        CreateSeeds::generate($name, $type, $direction, $wordLength, $totalCount, $vowels, $consonants );



        return view('seeder.confirmation', compact('name'));


    }
}
