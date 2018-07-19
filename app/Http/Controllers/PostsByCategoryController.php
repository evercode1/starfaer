<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsByCategoryController extends Controller
{
    public function index($name)
    {


        $result = Category::where('name', $name)->first();

        $posts = Post::live()->byCategory($result->id)->simplePaginate(5);

        $category = $result->name;

        return view('posts-by-category.index', compact('posts', 'category'));

    }
}
