<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('category.index')->with('categories' , Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // validate 
        $this -> validate ($request , [

            'name' => 'required' 

        ]);

    //    Store data 
    // $category = new Category;
    // $category -> name = $request -> name;
    // $category -> save();
      
    Category::create ([
           'name' => $request -> name
    ]);


    // Session::flash('success' , 'created');

    session()->flash('success', 'Category Created Successfuly');

    // red
    return redirect(route ('cat.index'));


   
     
     






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
        
        $categories = Category::find($id);
        return view ('category.edit')->with('categories' ,  $categories);
        


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
        // //Link All Data 
        // $data = request() -> all();

        // Update varialbe 
        $categories  =  Category::find($id);
        $categories -> name = $request -> name;
        $categories -> save();

        session()->flash('success', 'Category Update Successfuly');

        // RED
        return redirect (route ('cat.index') );
        
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
        $categories = Category::find($id);

        $categories->delete();

        session()->flash('error', 'Category Deleted Successfuly');

        // Red
        return redirect (route ('cat.index'));
    }
}
