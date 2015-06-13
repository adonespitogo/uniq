<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::group(['before' => 'auth' ],function(){
  Route::resource('events','EventsController');
  Route::resource('categories','CategoriesController');
  Route::resource('comments','CommentsController');
  Route::resource('roles','RolesController');
  Route::resource('messages','MessagesController');
  Route::resource('favourites','FavouritesController');

  Route::controller('event','EventsController');
  Route::controller('category','CategoriesController');
  Route::controller('comment','CommentsController');
  Route::controller('role','RolesController');
  Route::controller('message','MessagesController');
  Route::controller('favourite','FavouritesController');
});

Route::post('oauth/access_token', 'OAuthController@postAccessToken');
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');


App::missing(function($exception){
	return '404 template';
});