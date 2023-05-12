@extends('layouts.old-app')

@section('title', 'Users')

@section('content')
    <p>This is a list of users on the site</p>

    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}"> {{ $user->name }} </a></li>
        @endforeach
    </ul>
@endsection