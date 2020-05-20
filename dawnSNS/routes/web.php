<?php

Route::get('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@add')->name('register.add');

Route::post('/added', 'Auth\RegisterController@added')->name('register.added');

Route::post('/index', 'PostsController@index')->name('posts.index');
Route::get('/index', 'PostsController@home')->name('posts.home');

Route::get('/profile', 'PostsController@profile')->name('posts.profile');

Route::get('/followList', 'FollowsController@followList')->name('follows.followList');

Route::get('/followerList', 'FollowsController@followerList')->name('follows.followerList');