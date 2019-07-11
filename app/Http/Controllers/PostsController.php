<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    public function index()
    {
        $posts = Post::all();
        
        return view('posts.index', compact('posts'));
    }

    
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('posts.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|profanity|string|max:100',
            'body' => 'required|profanity|string|max:1000',
            'category_id' => 'required|int',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);
        
        return redirect()->route('home');
    }

    public function show($id)
    {
        $post = Post::find($id);
    
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|profanity|string|max:100',
            'body' => 'required|profanity|string|max:1000',
        ]);

        $post = Post::findOrFail($id);
        if ($post->id == Auth::id()) {
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            return redirect()->route('post', $id);
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $searchTerm = '%' . $request->serchTerm . '%';
        $posts = Post::where('title', 'LIKE', $searchTerm)->get();
        return view('posts.index', compact('posts'));
    }
}
