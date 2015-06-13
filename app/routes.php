<?php

Route::get('/', function()
{
  if (Auth::guest()) {
    return Redirect::to('/users/login');
  }
  return View::make('hello');
});


Route::resource('events','EventsController');
Route::resource('categories','CategoriesController');
Route::resource('comments','CommentsController');
Route::resource('messages','MessagesController');
Route::resource('favourites','FavouritesController');

Route::controller('event','EventsController');
Route::controller('category','CategoriesController');
Route::controller('comment','CommentsController');
Route::controller('message','MessagesController');
Route::controller('favourite','FavouritesController');

Route::post('oauth/access_token', 'OAuthController@postAccessToken');
Route::controller('oauth', 'OAuthController');
Route::get('me', array('before' => 'auth', 'uses' => 'UsersController@currentUser'));
Route::put('users/{id}', array('before' => 'auth', 'uses' => 'UsersController@updateUser'));
Route::put('users/{id}/password', array('before' => 'auth', 'uses' => 'UsersController@updatePassword'));

//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::get('login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::post('login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
Route::get('logout', 'UsersController@logout');
Route::controller('user', 'UsersController');
App::missing(function($exception){
  return '404 template';
});

