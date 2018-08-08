<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use App\Star;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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



        return view('home.index', compact('planetLifePercent', 'starLifePercent'));
    }
}
