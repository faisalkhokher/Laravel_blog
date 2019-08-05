<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Mass Assignment 
    protected $fillable =  ['tag'];

    //
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
