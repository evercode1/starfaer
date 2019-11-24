<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Star;
use App\Planet;

class WorldsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {

        $planetLifeCount = Planet::where('is_life_present', 1)->count();

        $planetTotal = Planet::where('is_active', 1)->count();

        $planetLifePercent = sprintf('%g', $planetLifeCount / $planetTotal * 100);

        $planetLifePercent = (int)$planetLifePercent;

        $starsWithLife = Star::with(['planets' => function ($query) {
            $query->where('is_life_present', 1);
        }])->count();

        $starTotal = Star::where('is_active', 1)->count();

        $starLifePercent = sprintf('%g', $starsWithLife / $starTotal * 100);

        $starLifePercent = (int)$starLifePercent;



        return view('worlds.index', compact('planetLifePercent', 'starLifePercent'));


    }

}
