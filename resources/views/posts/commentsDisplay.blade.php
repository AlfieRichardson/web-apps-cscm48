@foreach ($comments as $comment)
    <div>
        <h4> {{ $comment->user->name }} says: </h4>
        <p> {{ $comment->content }} </p>
    </div>
@endforeach