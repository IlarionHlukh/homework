<form method="POST" action="/posts/{{ $post->id }}/comments" style="margin: 10px 0 10px 0">
    {{ csrf_field() }}

    @if (isset($parentId))
        <input name="parent_id" type="hidden" value="{{ $parentId }}"></input>
    @endif
    <div class="form-group">
        <label for="commentBody">Текст комментария</label>
        <textarea class="form-control" id="commentBody" name="body" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
