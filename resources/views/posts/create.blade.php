@extends('layouts.old-app')

@section('title', 'Post Writer')

@section('content')

<section class="container">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf        
        <label for="content">Title</label>
        <input 
            type="text" 
            placeholder="Max 32 characters..." 
            id="title" 
            name="title"
            value="{{ old('title') }}"></input>
        
        <label for="content">Text</label>
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