<?php

namespace App\Http\Controllers;

use App\Tag;    
use App\Post;
use App\Setting;
use App\Category;
use App\Profile;
use App\User;

use Illuminate\Http\Request;

class FrondEndController extends Controller
{
    public function index()
    {
        return view('index')
        // Query Builder Methods . . . 
                ->with('title', Setting::first()-> name)
                ->with('categories', Category::take(6)->get())
                ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                ->with('second_post' , Post::orderBy('created_at' ,  'desc')->skip(1)->take(1)->get()->first())
                ->with('third_post' , Post::orderBy('created_at' ,  'desc')->skip(2)->take(1)->get()->first())
                ->with('web' , Category::find(13))
                ->with('blog' , Category::find(9))
                ->with('news'  , Category::find(4))
                ->with('setting' , Setting::first())
                ->with('about' , Profile::first());   
    }


    public function singlePost ($slug) 
    {
      
     $posts = Post::where('slug', $slug)->first();

     $next_id = Post::where('id' , '>' , $posts -> id)->min('id');
     $pre_id  = Post::where('id' , '<' , $posts -> id)->max('id');

       return view('single')
       ->with('posts', $posts)
       ->with('title', $posts-> title)
       ->with('setting', Setting::first())
       ->with('categories', Category::take(6)->get())
       ->with('about' , Profile::first())
       ->with('user' , User::first())
       ->with('next' , Post::find($next_id))
       ->with('pre' , Post::find($pre_id))
       ->with('tags' , Tag::all())
       ->with('setting' , Setting::first());
                             
    }
    // Exit 


    // Category 
    public function category($id) 
    {
        $category = Category::find($id);
        return view ('category')
        ->with('category' , $category)
        ->with('title' , $category -> name)
        ->with('setting', Setting::first())
        ->with('categories', Category::take(6)->get())
        ->with('about' , Profile::first())
        ->with('user' , User::first())
        ->with('tags' , Tag::all());

    }







}
