<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('Tags.index')->with('tags' , Tag::all());
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('Tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate 
        $this -> validate ($request , [
            'tag'  =>  'required'
        ]);


        Tag::create([
        
            'tag'  => $request -> tag 

        ]);

    session()->flash('success', 'Tag Created');

    return redirect (route ('tag.index'));

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
        $tags = Tag::find($id);
        return view ('Tags.edit')->with('tags' , $tags);
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
        //
        $this -> validate ($request , [
            'tag'   =>   'required'
        ]);


        // Update
        $tags = Tag::find($id);

        $tags -> tag = $request -> tag;

        $tags  -> save();

        $request->session()->flash('success', 'Updated Tag');
        
        return redirect(route ('tag.index'));
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
        $tags = Tag::find($id);

        $tags -> delete();

      session()->flash('success', 'Delete You Data');
        
        return redirect (route('tag.index'));
    }
}
