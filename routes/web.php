<?php

Route::get('/', 'PagesController@index');
Route::get('/post/{slug}', 'PagesController@post')->name('pages.post');

Route::get('/user/{id}', 'PagesController@user')->name('pages.user');

Auth::routes();

/*
* Group up routes for profile CRUD and such
*/
Route::group(['prefix' => 'profile'], function() {

  Route::get('/', 'ProfileController@index')->name('profile.index');
  Route::get('/drafts', 'ProfileController@drafts')->name('profile.drafts');

  // CRUD Post
  Route::resource('post', 'PostController', [
    'except' => ['index']
  ]);

});

// Bookmarking routes
Route::put('/bookmark', 'BookmarkController@store');
Route::delete('/bookmark/{id}', 'BookmarkController@destroy');
