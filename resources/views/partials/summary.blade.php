<div class="content">

    <a href="{{ route('posts.show', [$post->slug]) }}">
        <h1 class="title">{{ $post->title }}</h1>
    </a>
    <p><b>Опубликовано:</b> {{ $post->created_at->diffForHumans() }}</p>
    <img src="{{asset($post->image)}}" width="700" alt="image"/>
    <br><p><b>Категория: </b>{{ $post->category->title}} </p>
    <p>{!! nl2br(e($post->content)) !!}</p>
    <p><b>Автор: {{$post->user->name}}</p>
    @if(isset($post))
        Комментариев: {{ $post->comments_count }}
    @endif
</div>

