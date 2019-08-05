<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Profile;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('users.index')->with('users' , User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name'  => $request -> name , 
            'email' =>  $request -> email , 
            'password'  => bcrypt('password')
        ]);
       
        $profile = Profile::create([
            'user_id' => $user-> id,
          
        ]);

      session()->flash('success', 'New user created');

        return redirect(route ('user.create'));


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
    $user =  User::find($id);
    $user -> delete();

    return redirect (route ('user.index'));

    }


    // Todo ---->>>> Make admin Logic
    public function admin($id) 
    {

        // * ====>  find User 
        $user = User::find($id);

        // * -----> if user make admin so , ====>>>> is equal to 1 
        $user -> admin = 1 ; 

        // * Then Saved . . . 
        $user -> save();

        // Flash
       session()->flash('success', 'Successfuly changed user premission');

        //    Redirect 
        return redirect  (route('user.index'));


    }


    // Todo ------> Not Admin Logic

    public function not_admin($id) 
    {

        // * ====>  find User 
        $user = User::find($id);

        // * -----> if user make admin so , ====>>>> is equal to 1 
        $user -> admin = 0 ; 

        // * Then Saved . . . 
        $user -> save();

        // Flash
       session()->flash('success', 'Successfuly changed user premission');

        //    Redirect 
        return redirect  (route('user.index'));


    }
}
