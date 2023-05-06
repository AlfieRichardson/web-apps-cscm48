@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul>
            <li> {{ $post->title }} </li>
            <li> {{ $post->content }} </li>
    </ul>
@endsection