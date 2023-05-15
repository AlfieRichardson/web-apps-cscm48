@extends('layouts.old-app')

@section('title', $post->title)

@section('description')
    <p class="description"><em>{{ $post->content }}</em></p>

    <h4>
        By <a href="{{ route('users.show', ['id' => $post->user_id]) }}"> {{ $post->user->name }} </a>
    </h4>
    
    @if(Auth::check())
    <a class="button" href="{{ route('comments.create', ['id' => $post->id]) }}">Write Comment</a>
    @endif

@endsection

@section('content')

    @foreach ($post_comments as $comment)
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