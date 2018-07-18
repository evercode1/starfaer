<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class VideosByCategoryController extends Controller
{
    public function index($id)
    {
        $catId = Category::where('name', $id)->pluck('id')->first();

        $category = Category::where('name', $id)->pluck('name')->first();

        return view('videos-by-category.index', compact('category', 'catId'));

    }
}
