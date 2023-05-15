@extends('layouts.old-app')

@section('title', $user->name)

@section('content')

<section class ="container">
    <h2>Posts:</h2>
</section>

@foreach ($user_posts as $post)
<section class="container solid">
    <h4>
        <a href="{{ route('users.show', ['id' => $post->user_id]) }}">{{ $post->user->name }}</a> posted:
    </h4>
    <h2 class="title">
        {{ $post->title }}
    </h2>
    <blockquote>
        <p class="description"><em>{{ $post->content }}</em></p>
    </blockquote>
    
    <div class="container">
        <div class="row">
            <div class="column">
                <p>
                    <a class="button button-outline" href="{{ route('posts.show', ['id' => $post->id]) }}">View Post</a>
                </p>
            </div>
            @if($post->user_id == Auth::id() || (Auth::check() && Auth::user()->admin == True))
            <div class="column">
                <form method="POST" action="{{ route('posts.edit', ['id' => $post->id]) }}">
                    @csrf
                    @method('PUT')
                    <button class="button button-outline" type="submit">Edit Post</a>
                </form>
            </div>
            <div class="column">
                    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="button button-outline" type="submit">Delete</a>
                    </form>
            </div>
            @endif
        </div>
    </div>
</section>
@endforeach

<section class ="container">
    <h2>Comments:</h2>
</section>

@foreach ($user_comments as $comment)
    <section class="container">
        <h4> <a href="{{ route('users.show', ['id' => $comment->user_id]) }}"> {{ $comment->user->name }}</a> commented: </h4>
        <p> {{ $comment->content }} </p>
        @if($comment->user_id == Auth::id() || (Auth::check() && Auth::user()->admin == True))
        <div class="container">
            <div class="row">
                <div class="column">
                    <form method="POST" action="{{ route('comments.edit', ['id' => $comment->id]) }}">
                        @csrf
                        @method('PUT')
                        <button class="button button-outline" type="submit">Edit Comment</a>
                    </form>
                </div>
                <div class="column">
                    <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="button button-outline" type="submit">Delete Comment</a>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </section>
    @endforeach
@endsection