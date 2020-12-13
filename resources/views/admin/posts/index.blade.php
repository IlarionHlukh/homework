@section('title', 'Home')
@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        @include('admin.posts.summary')

@endsection
