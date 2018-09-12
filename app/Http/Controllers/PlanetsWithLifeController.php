<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetsWithLifeController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth']);

    }

    public function index()
    {

        return view('planets-with-life.index');


    }

}
