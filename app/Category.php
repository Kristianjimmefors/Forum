<?php

namespace App;

use App\Post;

class Category extends Model
{
    //one to many relationship in databse
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
