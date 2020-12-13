@extends('admin.categories.index')

@section('content')
    <h1>Редактирование категории</h1>
    <form method="POST" enctype="multipart/form-data"
          @method('PUT')
          @csrf
          action="{{ route('category.update', $category) }}">

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Наименование"
                   required maxlength="100" value="{{ old('name') ?? $category->title }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="Краткое описание"
                      maxlength="200" rows="3">{{ old('content') ?? $category->content }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
