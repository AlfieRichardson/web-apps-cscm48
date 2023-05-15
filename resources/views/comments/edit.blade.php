@extends('layouts.old-app')

@section('title', 'Comment Editor')

@section('content')

<section class="container">
    <form method="POST" action="{{ route('comments.update',  $comment->id) }}">
        @csrf  
        @method('PUT')      
        <label for="content">Comment Editor</label>
        <textarea 
            placeholder="Text here..." 
            id="content" 
            name="content"
            value="{{ old('content') }}"></textarea>
        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
        <div class="float-right">
            <input class="button" type="submit" value="Submit">
            <a class="button" href="{{ route('posts.index') }}">Cancel</a>
        </div>
    </form>
</section>

@endsection