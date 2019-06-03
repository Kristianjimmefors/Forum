<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Category;

class post extends Model
{
    //one to many relationship in databse
    public function comments(){
        return $this->hasMany('App\comment', 'post_id', 'id');
    }

    //one to one relationship in databse
    public function user(){
        return $this->belongsTo(User::class);
    }

    //one to one relationship in databse
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
