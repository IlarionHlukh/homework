@section('title', $post->title)
@extends('layouts.app')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @include('partials.summary')
    <div class="container col-md">
        @if (Auth::check())
            <form method="post" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('delete')
                <div class="field is-grouped">
                    <div class="control">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-info">Edit</a>
                    <div class="control">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4>Коментарии</h4>

                @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                <hr />
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store'   ) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
