@extends('layouts.old-app')

@section('title', 'Posts')

@section('description')
    <p class="description">This is a list of posts made on the site.</p>
    
    @if(Auth::check())
    <a class="button" href="like">Write Post</a>
    @endif

@endsection

@section('content')
    
    @foreach ($posts as $post)
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
                        <a class="button" href="like">Like</a>
                    </p>
                </div>
                <div class="column">
                    <p>
                        <a class="button" href="dislike">Dislike</a>
                    </p>
                </div>
                <div class="column column-offset-25">
                    <p>
                        <a class="button button-outline" href="{{ route('posts.show', ['id' => $post->id]) }}">View Post</a>
                    </p>
                </div>
                <div class="column">
                    <p>
                        <a class="button button-outline" href="{{ route('posts.show', ['id' => $post->id]) }}">Comment</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    <section class="container">
        <div class"float-right">
            {{ $posts->links() }}
        </div>
    </section>

@endsection