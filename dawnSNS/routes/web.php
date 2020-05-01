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
     return view('welcome');
 });
// Route::get('/home', 'HomeController@index')->name('home');


//ログアウト中のページ
//Route::get('/login', 'Auth\LoginController@login');
//Route::post('/login/{mail}/{password}', 'Auth\LoginController@login');
//
//Route::get('/register', 'Auth\RegisterController@register');
//Route::post('/register', 'Auth\RegisterController@register');
//
//Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
//TOPページ
Route::get('/index','PostsController@index');

//プロフィールのUpdateについて
Route::get('/profile','UsersController@profile');
Route::post('/post/update', 'PostsController@updateForm');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');


//Createについて
Route::post('/post/create', 'PostsController@create');


//Deleteについて
Route::get('/post/{id}/delete', 'PostsController@delete');

//auth認証
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');