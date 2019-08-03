<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //







    // relationshiop of One to Many 
    public function posts()
    {
        // App\Post is a basically Class ->Karnel... 
        return $this->hasMany('App\Post');


    }


}

