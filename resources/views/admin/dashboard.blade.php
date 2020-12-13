@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Категорій {{\App\Models\Category::count()}}</span></p>
                    <p><a href="{{route('category.index')}}" class="btn btn-primary btn-sm">Просмотреть</a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Постів {{\App\Models\Post::count()}}</span></p>
                    <p><a href="{{route('show_posts.index')}}" class="btn btn-primary btn-sm">Просмотреть</a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Коментарів {{\App\Models\Comment::count()}}</span></p>
                    <p><a href="{{route('category.index')}}" class="btn btn-primary btn-sm">Просмотреть</a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Користувачів {{\Illuminate\Foundation\Auth\User::count()}}</span></p>
                    <p><a href="{{route('users.index')}}" class="btn btn-primary btn-sm">Просмотреть</a></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{ route('category.create') }}">Создать категорию</a>
                <a class="list-group-item" href="">
                    <h4 class="list-group-item-heading"></h4>
                    <p class="list-group-item-text">
                        Кол-во материалов
                    </p>

                </a>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{ route('posts.create') }}">Создать пост</a>
                <a class="list-group-item" href="#">
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection
