@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
        @endif
        <hr>

        <a href="{{ route('category.create')}}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus-square-o"></i> Создать категорию</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th>Описание</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->published}}</td>
                    <td>{{$category->content}}</td>
                    <td>
                        <form action="{{ route('category.edit', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-sm btn-info">Edit</button>
                        </form>
                    </td>
                        <td>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
