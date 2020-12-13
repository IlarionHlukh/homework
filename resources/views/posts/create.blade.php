@section('title', 'New Post')
@extends('layouts.app')

@section('content')
    @unless (Auth::check())
            <div class="alert alert-danger" role="alert">
                Для створення посту, увійдіть будь ласка!
            </div>
    @endunless
    @if (Auth::check())
    <h1 class="title">Create a new post</h1>

    <div class="field">
    <div class="control">
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input type="text" name="title" value="{{ old('title') }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Content</label>
                <div class="control">
                    <textarea name="content" class="textarea" placeholder="Content" minlength="5" maxlength="2000" required rows="10"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                    <div class="select">
                        <select name="category_id" id="inputCategory" class="form-control">
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="file" multiple name="image">
            <button type="submit">Загрузить</button>
        </form>
    </div>
</div>
@endif
@endsection
