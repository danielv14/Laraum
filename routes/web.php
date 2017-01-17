<?php

// Index route
Route::get('/', 'PagesController@index');
// View all posts
Route::get('/post/{slug}', 'PagesController@post')->name('pages.post');
// View a specific user
Route::get('/user/{id}', 'PagesController@user')->name('pages.user');
// Authentication routes
Auth::routes();
// Bookmarking routes
Route::put('/bookmark', 'BookmarkController@store');
Route::delete('/bookmark/{id}', 'BookmarkController@destroy');
// Like routes
Route::put('/like/{id}', 'LikesController@like');
Route::put('/unlike/{id}', 'LikesController@unlike');

/*
* Group up routes for profile CRUD and such
*/
Route::group(['prefix' => 'profile'], function() {
  // Current users profile
  Route::get('/', 'ProfileController@index')->name('profile.index');
  // Current users drafts
  Route::get('/drafts', 'ProfileController@drafts')->name('profile.drafts');
  // Current users bookmarks
  Route::get('/bookmarks', 'ProfileController@bookmarks')->name('profile.bookmarks');

  // CRUD Resource for Current users post
  Route::resource('post', 'PostController', [
    'except' => ['index']
  ]);

});
