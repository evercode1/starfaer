<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;


class TestController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {

       $test = 'Tal Faer';

        $test = strtolower(str_replace(" ","-", $test));

        dd($test);

        return view('test.index');

    }


}
