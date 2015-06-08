<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');

Route::resource('installs', 'InstallsController');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Admin'], function()
{
    Route::resource('/', 'DashboardController');
	Route::resource('users', 'UsersController');
	Route::resource('installs', 'InstallsController');

});
#Route::get('pages', 'PagesController@index');
#Route::get('about', 'PagesController@about');
#Route::get('author', 'PagesController@author');
#Route::get('significance', 'PagesController@significance');
#Route::get('reviews', 'PagesController@reviews');
#Route::get('faqs', 'PagesController@faqs');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
