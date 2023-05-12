@extends('layouts.old-app')

@section('title', 'Comment Writer')

@section('content')

<section class="container">
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <label for="post_id">Post ID</label>
        <input 
            type="text" 
            placeholder="No." 
            id="post_id" 
            name="post_id"
            value="{{ old('post_id') }}">

        <label for="user_id">User ID</label>
        <input 
            type="text" 
            placeholder="No." 
            id="user_id" 
            name="user_id"
            value="{{ old('user_id') }}">
            
        <label for="content">Comment</label>
        <textarea 
            placeholder="Text here..." 
            id="content" 
            name="content"
            value="{{ old('content') }}"></textarea>
            
        <div class="float-right">
            <input class="button" type="submit" value="Submit">
            <a class="button" href="{{ route('posts.index') }}">Cancel</a>
        </div>
    </form>
</section>

@endsection