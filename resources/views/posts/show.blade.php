@extends('layouts.old-app')

@section('title', $post->title)

@section('description')
    <p class="description"><em>{{ $post->content }}</em></p>

    <h4>
        By <a href="{{ route('users.show', ['id' => $post->user_id]) }}"> {{ $post->user->name }} </a>
    </h4>
    
    @if(Auth::check())
    <a class="button" href="{{ route('comments.create') }}">Write Comment</a>
    @endif

@endsection

@section('content')

    @foreach ($post_comments as $comment)
    <section class="container">
        <h4> <a href="{{ route('users.show', ['id' => $comment->user_id]) }}"> {{ $comment->user->name }}</a> commented: </h4>
        <p> {{ $comment->content }} </p>
        <div class="container">
            <div class="row">
                <div class="column">
                    <p>
                        <a class="button" href="like">Like</a>
                    </p>
                </div>
                <div class="column">
                    <p>
                        <a class="button" href="dislike">Dislike</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endforeach

@endsection