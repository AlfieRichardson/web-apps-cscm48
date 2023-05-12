@extends('layouts.old-app')

@section('title', $user->name)

@section('content')
    <table>
        <tr>
            <th>Posts</th>
            <th>Comments</th>
        </tr>
        <tr>
            <td>
                <ul>
                    @foreach ($user_posts as $post)
                        <li><a href="{{ route('posts.show', ['id' => $post->id]) }}"> {{ $post->title }} </a></li>
                    @endforeach
                </ul>
            </td>
            <td>
                <ul>
                    @foreach ($user_comments as $comment)
                        <li> 
                            <table>
                                <tr>
                                    <th>Content</th>
                                    <th>Post</th>
                                </tr>
                                <tr>
                                    <td> {{ $comment->content }} </td>
                                    <td> <li><a href="{{ route('posts.show', ['id' => $comment->post_id]) }}"> {{ $comment->post->title }} </a></li> </td>
                                </tr>
                            </table>
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
@endsection