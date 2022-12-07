<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register_new_user;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PostLikeController;


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
Route::post('/posts/{post}/like', 'PostLikeController@store' )->name('posts.likes');
Route::delete('/posts/{post}/like', 'PostLikeController@destroy' )->name('posts.likes');

Route::get('posts', 'Postcontroller@index' )->name('posts');
Route::post('posts', 'Postcontroller@store' );
Route::delete('/posts/{post}', 'Postcontroller@destroy')->name('posts.destroy');

Route::post('/logout', 'Auth\LogoutController@store' )->name('logout');

Route::get('/login', 'Auth\LoginController@index' )->name('login');
Route::post('/login', 'Auth\LoginController@store' );


Route::get('/Dashboard', 'DashboardController@index' )->name('Dashboard');

Route::get('register', 'Auth\Register_new__User@index' )->name('register');
Route::post('register', 'Auth\Register_new__User@store' );


Route::get('/post', function () {
    return view('post.index');
});

Route::get('/', function () {
    return view('post.index');
});