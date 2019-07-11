<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Category;

class post extends Model
{
    //en till många relation mellan databas tabellen posts och comments
    public function comments(){
        return $this->hasMany('App\comment', 'post_id', 'id');
    }

    //en till en relation mellan databas tabellen posts och users
    public function user(){
        return $this->belongsTo(User::class);
    }

    //en till en relation mellan databas tabellen posts och categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addComment($comment){
        $this->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $comment
        ]);
    }

    
}
