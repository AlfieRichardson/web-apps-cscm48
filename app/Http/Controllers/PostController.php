<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->simplePaginate(10);

        $posts->withPath('/posts');

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:32',
            'content' => 'required'
        ]);

        $new = new Post;
        $new->user_id = auth()->id();
        $new->title = $validatedData['title'];
        $new->content = $validatedData['content'];
        $new->save();

        session()->flash('message', 'Post submitted.');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $post_comments = Comment::orderBy('created_at','desc')->where('post_id', $id)->get();

        return view('posts.show', ['post' => $post, 'post_comments' => $post_comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        
        $validatedData = $request->validate([
            'title' => 'max:32|nullable',
            'content' => 'nullable',
        ]);
        
        if (!is_null($validatedData['title'])) {
            $post->content = $validatedData['title'];
        }
        if (!is_null($validatedData['content'])) {
            $post->content = $validatedData['content'];
        }
        $post->save();

        session()->flash('message', 'Post edited.');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where('id', $id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post was deleted.');
    }
}
