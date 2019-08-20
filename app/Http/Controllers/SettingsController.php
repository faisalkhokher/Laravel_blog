<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct() 
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('settings.settings')->with('settings', Setting::first());
    }

    public function update()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'address' => 'required'
        ]);

        $settings = Setting::first();

        $settings-> name = request()-> name;
        $settings-> address = request()-> address;
        $settings-> email = request()-> email;
        $settings-> number = request()-> number;

        $settings->save();

      

        return redirect()->back();
    }
}
