@extends('layouts.old-app')

@section('title', 'Comment Writer')

@section('content')

<section class="container">
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf        
        <label for="content">Comment</label>
        <textarea 
            placeholder="Text here..." 
            id="content" 
            name="content"
            value="{{ old('content') }}"></textarea>
        <input type="hidden" name="post_id" value="{{ $id }}">
        <div class="float-right">
            <input class="button" type="submit" value="Submit">
            <a class="button" href="{{ route('posts.index') }}">Cancel</a>
        </div>
    </form>
</section>

@endsection