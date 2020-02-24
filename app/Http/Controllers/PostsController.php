<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        
        $posts = Post::latest();
        $posts->filter(request(['month','year']));
        $posts = $posts->get();
       

        return view('posts.index', compact('posts', 'archives'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $this->validate(request(), [
        'title' =>'required',
        'body'=>'required'
        ]);


        auth()->user()->publish(new Post(request(['title','body'])));

        // Post::create([
        //  'title' => request('title'),
        //  'body' => request('body'),
     //        'user_id' => auth()->id()
        // ]);
        session()->flash('message', 'You have successfully updated a post');
        return redirect('/');
    }
}
