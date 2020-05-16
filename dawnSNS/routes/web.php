<?php

Route::get('/login', 'Auth\LoginController@login');

Route::post('/index', 'PostsController@index')->name('posts.index');