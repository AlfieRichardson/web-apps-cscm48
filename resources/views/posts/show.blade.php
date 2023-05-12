@extends('layouts.old-app')

@section('title', $post->title)

@section('content')
    <div>
        <h2>
            By: <a href="{{ route('users.show', ['id' => $post->user_id]) }}"> {{ $post->user->name }} </a>
        </h2>
    </div>

    <div>
        <p> {{ $post->content }} </p>
    </div>

    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
@endsection