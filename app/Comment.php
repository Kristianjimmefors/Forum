<?php

namespace App;


class Comment extends Model
{
    //en till en relation mellan databas tabellen comments och posts
    public function post(){
        return $this->belongsTo(Post::class);
    }

    //en till en relation mellan databas tabellen comments och users
    public function user(){
        return $this->belongsTo(User::class);
    }
}
