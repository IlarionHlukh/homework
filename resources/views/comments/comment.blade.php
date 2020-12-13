<div class="panel panel-default" style="margin-top: 10px">
    <div class="panel-heading">
        <div class="level">
            <h4 class="flex">
                {{ $comment->owner->name }} пишет
            </h4>
        </div>
    </div>

    <div class="panel-body">
        {{ $comment->body }}
        @if (Auth::check())
            <a class="btn btn-link" data-toggle="collapse" href="#commentForm{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                Комментировать
            </a>
            <div class="collapse" id="commentForm{{$comment->id}}">
                @include ('comments.form', ['parentId' => $comment->id])
            </div>
        @endif

        @if (isset($comments[$comment->id]))
            @include ('comments.list', ['collection' => $comments[$comment->id]])
        @endif
    </div>

</div>
