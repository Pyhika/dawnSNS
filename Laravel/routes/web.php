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

//Route::get('hello', function(){
//    echo 'Hello World !';
//});

Route::get('/hello', 'PostsController@hello');

Route::get('/index', 'PostsController@index');

//Createについて
Route::get('/post/create', 'PostsController@createForm');

Route::post('/post/create', 'PostsController@create');

//Updateについて
Route::get('/post/{id}/updateForm', 'PostsController@updateForm');

Route::post('/post/update', 'PostsController@update');

//Deleteについて
Route::get('/post/{id}/delete', 'PostsController@delete');
Auth::routes();

//auth認証
Route::get('/home', 'HomeController@index')->name('home');
