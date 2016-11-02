<?php

Route::get('/', 'PagesController@index');
Route::get('/post/{slug}', 'PagesController@show')->name('page.show');
Route::get('/post/{slug}', 'PagesController@post')->name('pages.post');

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
