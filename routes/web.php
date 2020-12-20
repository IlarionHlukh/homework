<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth','is_admin'] ], function () {
    Route::get('/', '\App\Http\Controllers\Admin\DashboardController@dashboard')->name('admin.index');

    Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');

    Route::resource('users', '\App\Http\Controllers\Admin\ShowUsersController');

    Route::resource('show_posts', '\App\Http\Controllers\Admin\ShowPostsController');

    Auth::routes();
});

Route::resource('posts', '\App\Http\Controllers\PostController');
Route::resource('comments', '\App\Http\Controllers\CommentController');

Route::get('/', function () {
    return view('layouts.main_layouts');
});


Auth::routes(['verify' => true]);

Route::get('profile', function () {

})->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



