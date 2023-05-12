@extends('layouts.old-app')

@section('title', 'Users')

@section('description')
    <p class="description">This is a list of users on the site.</p>
@endsection

@section('content')
    @foreach ($users as $user)
    <section class="container">
        <a href="{{ route('users.show', ['id' => $user->id]) }}"> {{ $user->name }} </a>
    </section>
    @endforeach

@endsection