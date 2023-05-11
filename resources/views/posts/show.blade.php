@extends('layouts.old-app')

@section('title', 'Post Details')

@section('content')
    <div>
        <h2> {{ $post->title }} </h2>
    </div>

    <div>
        <p> {{ $post->content }} </p>
    </div>

    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
@endsection