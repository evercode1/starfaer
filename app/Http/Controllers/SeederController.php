<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Utilities\CreateSeeds;
use App\Rules\NameIsAllowed;
use App\Exceptions\NameException;
use App\Utilities\FetchSeeds;

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
            'start_with' => 'required|string',
            'direction' => 'required|string',
            'merge' => 'required|string',
            'word_length' => 'required|integer',
            'total_count' => 'required|integer',
            'vowels' => 'required|string',
            'consonants' => 'required|string',

        ]);

        $vowels= config('vowels.'. $request->vowels);
        $consonants = config('consonants.' . $request->consonants);


        $config = ['name' => $request->name,
                   'type' => 'advanced',
                   'startWith' => $request->start_with,
                   'direction' => $request->direction,
                   'merge' => $request->merge,
                   'wordLength' => $request->word_length,
                   'totalCount' => $request->total_count,
                   'vowels' => $vowels,
                   'consonants' => $consonants];



        CreateSeeds::generate($config);

        $name = $config['name'];


        return view('seeder.confirmation', compact('name'));


    }
}
