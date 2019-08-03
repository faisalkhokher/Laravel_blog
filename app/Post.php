<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //




    // relationship b/w Cat
    public function category()  
    {
        return $this->belongsTo('App\Category');
    }
}
