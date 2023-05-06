@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p>This is a list of posts made on the site</p>

    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}"> {{ $post->title }} </a></li>
        @endforeach
    </ul>
@endsection