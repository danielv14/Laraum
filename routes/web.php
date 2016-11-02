<?php

Route::get('/', 'PagesController@index');
Route::get('/post/{slug}', 'PagesController@post')->name('pages.post');

Route::get('/user/{id}', 'PagesController@user')->name('pages.user');

Auth::routes();

/*
* Group up routes for profile CRUD and such
*/
Route::group(['prefix' => 'profile'], function() {

  // CRUD Post
  Route::resource('post', 'PostController', [
    'except' => ['index']
  ]);

});
