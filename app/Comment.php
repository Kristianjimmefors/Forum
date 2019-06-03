<?php

namespace App;



class Comment extends Model
{
    //many to one (inverse) in database
    public function post(){
        return $this->belongsTo(Post::class);
    }

    //many to one (inverse) in database
    public function user(){
        return $this->belongsTo(User::class);
    }
}
