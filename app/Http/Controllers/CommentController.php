<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\Commented;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('comments.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|numeric',
            'content' => 'required|max:255'
        ]);

        $new = new Comment;
        $new->post_id = $validatedData['post_id'];
        $new->user_id = auth()->id();
        $new->content = $validatedData['content'];
        $new->save();
        
        $post = Post::find($new->post_id);
        $post->user->notify(new Commented($post));
        
        session()->flash('message', 'Comment submitted.');

        return redirect()->route('posts.show', ['id' => $validatedData['post_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        
        $validatedData = $request->validate([
            'post_id' => 'required|numeric',
            'content' => 'required|max:255'
        ]);

        $comment->content = $validatedData['content'];
        $comment->save();

        session()->flash('message', 'Comment submitted.');

        return redirect()->route('posts.show', ['id' => $validatedData['post_id']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::where('id', $id);
        $comment->delete();

        return redirect()->route('posts.index')->with('message', 'Comment was deleted.');
    }
}
