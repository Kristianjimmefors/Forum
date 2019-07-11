<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Post $post)
    {
        $this->validate(request(), [
            'newComment' => 'required|profanity|string|max:1000',
        ]);
        
        $post->addComment(request('newComment'));

        return redirect()->back();
    }

   
    public function show($id)
    {
        //
    }

    public function edit($post, $comment_id)
    {
        $comment = Comment::find($comment_id);
    
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $post, $comment_id)
    {
        $this->validate(request(), [
            'edditedComment' => 'required|profanity|string|max:1000',
        ]);
            
        $comment = Comment::find($comment_id);
        $comment->comment = request('edditedComment');
        $comment->updated_at = Carbon::now();
        $comment->save();

        return redirect()->route('post', $post);
    }

    
    public function destroy($post, $comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();

        return redirect()->back();
    }
}
