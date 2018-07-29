<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Utilities\AppendSeedsFile;

class SeedGroupController extends Controller
{
    public function create()
    {

        return view('seed-group.create');

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'seeds_name' => ['required', 'string'],
            'group_title' => 'required|string',
            'trim' => 'required|string',
            'syllables' => 'required|string',


        ]);

        $seedsName = $request->seeds_name;
        $groupTitle = $request->group_title;
        $syllables = $request->syllables;


        // format syllables as array

        $syllables = explode(',', $syllables);


        // get rid of white space

        $newSyllables = [];

        if($request->trim == 'yes'){

            $newSyllables = $this->trim($syllables, $newSyllables);

        } else {

            $newSyllables = $syllables;

        }




        AppendSeedsFile::make($seedsName, $groupTitle, $newSyllables);


        return view('seed-group.confirmation', compact('seedsName'));


    }

    /**
     * @param $syllables
     * @param $newSyllables
     * @return array
     */
    private function trim($syllables, $newSyllables)
    {
        foreach ($syllables as $value) {

            $newSyllables[] = trim($value);

        }

        return $newSyllables;
    }
}
