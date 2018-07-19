<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllBooksController extends Controller
{
    public function index()
    {


        return view('all-books.index');

    }
}
