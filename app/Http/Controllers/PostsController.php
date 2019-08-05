<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Post;

use App\Tag;

use Session;

use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view ('posts.index')->with('posts' , Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Session of validate if cate is not created then post is not created.
        $categories = Category::all();


        if ($categories -> count() == 0) {
            # code...

            // Sesssion

             session()->flash('info', 'You must have some category before attemp to create some posts :) ');

            return redirect()->back();
        }

        // 
        return view ('posts.create')->with('categories' , $categories)->with('tags' , Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request )
    {
        

        //get the data from the request
        $featured = $request -> featured;

        // Name the fille 
        $featured_new_name = time().$featured->getClientOriginalName();

        // Move Image into Public -> Uploads -> Posts  ----- Folder

        $featured -> move('uploads/posts' ,  $featured_new_name); 


        // ! Create saving posts ... 
    
        $posts = Post::create([

            'title'       => $request-> title , 
            'content'     => $request -> content,
            'featured'    => 'uploads/posts/' . $featured_new_name , 
            'category_id' => $request -> category_id, 
            'slug'        => str_slug ($request -> title)

        ]);

        $posts -> tags() -> attach($request -> tags);


        // session 
        session()->flash('success', 'Post Created Successfuly');

        return redirect(route ('posts.index'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $posts = Post::find($id);
        return view ('posts.edit')->with('posts' ,  $posts)->with('categories' , $categories)->with('tags' , Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        // $posts = Post::find($id);
        
        // //Update Image
        // if ($request->hasFile('featured'))
        // {
        //        //get the data from the request
        // $featured = $request -> featured;

        // // Name the fille 
        // $featured_new_name = time().$featured->getClientOriginalName();

        // // Move Image into Public -> Uploads -> Posts  ----- Folder

        // $featured -> move('uploads/posts' ,  $featured_new_name); 

        // // Saving update Image path in db
        // $posts -> featured = 'uploads/posts/' .$featured_new_name;
        // }

        // // Updating Values. 
        // $posts -> title = $request -> title;
        // $posts -> content = $request -> content ; 
        // $posts -> category_id  = $request -> category_id; 

        // $posts -> save();


        // ! Validation . . . 
        $this -> validate($request , [

            'title'    => 'required' , 
            'content'  => 'required'  , 
            // 'featured' => 'required' ,
            'category_id' => 'required' , 


        ]) ;



        // Get data from req 
        $posts = Post::find($id);

        //  ! Update Posts 
        if ($request->hasFile('featured'))
        {
            // Get featured from req
            $featured = $request -> featured;

            // Saving Original name form db 
            $featured_new_name = time().$featured -> getClientOriginalName();

            // Move the image into location 
            $featured -> move('uploads/posts/' , $featured_new_name);

            // Save Image 
            $posts -> featured  = 'uploads/posts/'.$featured_new_name;
        }
        

        // ! Now saving other variables 
        $posts -> title = $request -> title ; 
        $posts -> content = $request -> content;
        $posts -> category_id = $request -> category_id;
        $posts -> slug  = str_slug ($request -> title);

       

        // Save all
        $posts -> save();

        $posts -> tags() -> sync($request -> tags);

        session()->flash('success', 'Successfully Updated your data . . ');

        return redirect (route ('posts.index'));

        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = Post::find($id);
        $posts -> delete();

        // 
         session()->flash('warning', 'Post deleted temporary you can view on trash posts');
        // 
        return redirect (route('posts.index'));
    }


    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        
        return view('posts.trashed')->with('posts' , $posts);
    }

    public function kill($id)

    {
        $posts = Post::onlyTrashed()->where('id' , $id)->first();

        $posts -> forceDelete();

       session()->flash('success', 'Post deleted permanent in DB ');

       return redirect(route ('posts.trashed'));
    }

    public function restore($id)
    {
        // access db 
        $posts = Post::withTrashed()->where('id' , $id)->first();

        // Restore Data
        $posts -> restore();

        // Session
        session()->flash('success', 'Posts restored successfully');

        // Redirect
        return redirect(route ('posts.index'));



    }

}
