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
  Route::controller('event','EventsController');
  Route::controller('categorie','CategoriesController');
});

Route::post('oauth/access_token', 'OAuthController@postAccessToken');
