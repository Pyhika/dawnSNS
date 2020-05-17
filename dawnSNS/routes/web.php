<?php

Route::get('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@add')->name('register.add');

Route::post('/added', 'Auth\RegisterController@added')->name('register.added');

Route::post('/index', 'PostsController@index')->name('posts.index');