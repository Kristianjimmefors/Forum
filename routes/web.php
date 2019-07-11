<?php

Route::get('/', 'PostsController@index')->name('home');

Route::get('/posts/create', 'PostsController@create')->name('createpost');

Route::post('/posts', 'PostsController@store')->name('posts');

Route::post('/posts/search', 'postsController@search')->name('search');

Route::get('/posts/{post}', 'PostsController@show')->name('post');

Route::get('/posts/{post}/edit', 'PostsController@edit');

Route::put('/posts/{post}', 'PostsController@update');


Route::get('/posts/{post}/comments/{comment}/edit', 'CommentsController@edit');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::put('/posts/{post}/comments/{comment}', 'CommentsController@update');

Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');


Route::get('/posts/category/{category}', 'CategoriesController@show');


Route::get('/user/settings', 'UsersController@show');

Route::put('/user/{user}', 'UsersController@update');


Auth::routes();

Route::get('/home', 'HomeController@index');
