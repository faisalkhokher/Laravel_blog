<?php

namespace App\Http\Controllers;

use App\Post;

use App\User;

use App\Category;

use App\Tag;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('post_count' , Post::all()->count())
        ->with('trashed_post' , Post::onlyTrashed()->get()->count())
        ->with('users' , User::all()->count())
        ->with('cat' , Category::all()->count())
        ->with('tag' , Tag::all()->count());
    }
}
