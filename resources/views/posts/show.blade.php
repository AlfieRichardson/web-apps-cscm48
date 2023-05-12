@extends('layouts.old-app')

@section('title', $post->title)

@section('description')
    <p class="description"><em>{{ $post->content }}</em></p>

    <h4>
        By <a href="{{ route('users.show', ['id' => $post->user_id]) }}"> {{ $post->user->name }} </a>
    </h4>
    
    @if(Auth::check())
    <a class="button" href="like">Write Comment</a>
    @endif

@endsection

@section('content')
    @if(Auth::check())
    <a class="button" href="like">Create Comment</a>
    @endif

    @foreach ($post_comments as $comment)
    <div>
        <h4> <a href="{{ route('users.show', ['id' => $comment->user_id]) }}"> {{ $comment->user->name }}</a> says: </h4>
        <p> {{ $comment->content }} </p>
    </div>
    @endforeach

@endsection