<?php

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


 Route::get('/', function () {
     return view('login');
 });
// Route::get('/home', 'HomeController@index')->name('home');

//ログアウト中のページ
//未認証
Route::get('/login', 'Auth\LoginController@login')->name('login');
//認証
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::post('/added', 'Auth\RegisterController@added')->name('auth.added');

//ログイン中のページ

Route::group(['middleware' => 'auth'], function(){
    Route::post('/posts/index','PostsController@index')->name('posts.index');
});

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');

Route::get('/follower-list','PostsController@index');
