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

        $string = 'super_species';

        $string = str_replace('_', ' ', $string);

        $allControllerName = 'All' . ucwords($string) . 'Controller';

        $allControllerName = str_replace(' ', '', $allControllerName);

        dd($allControllerName);

        return view('test.index');

    }


}
