@foreach ($comments as $comment)
    <div>
        <h4> <a href="{{ route('users.show', ['id' => $comment->user_id]) }}"> {{ $comment->user->name }}</a> says: </h4>
        <p> {{ $comment->content }} </p>
    </div>
@endforeach