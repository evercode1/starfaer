<?php

namespace App\Http\Controllers;

use App\Utilities\FindOrCreateFolders;
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








        //return view('test.index');

    }


}
