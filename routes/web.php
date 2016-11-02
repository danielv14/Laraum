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

Route::get('/', 'PagesController@index');
Route::get('/post/{slug}', 'PagesController@show')->name('page.show');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
* Group up routes for profile CRUD and such
*/
Route::group(['prefix' => 'profile'], function() {

  // CRUD Post
  Route::resource('post', 'PostController', [
    'except' => ['index']
  ]);


});
