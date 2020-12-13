@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Ви увійшли! Вітаєм  {{ Auth::user()->name }}

                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            @if(auth()->user()->is_admin == 1)
                                Ваша роль Адміністратор:
                                <a href="{{route('admin.index')}}">Admin Panel</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
