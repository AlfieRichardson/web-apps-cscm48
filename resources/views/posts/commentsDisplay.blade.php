@foreach ($comments as $comment)
    <div>
        <h4> {{ $comment->author }} says: </h4>
        <p> {{ $comment->content }} </p>
    </div>
@endforeach