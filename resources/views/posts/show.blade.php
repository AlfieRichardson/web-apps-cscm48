@extends('layouts.old-app')

@section('title', '{{ $post->title }}')

@section('content')
    <div>
        <h2>
            By: {{ $post->user->name }}
        </h2>
    </div>

    <div>
        <p> {{ $post->content }} </p>
    </div>

    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
@endsection