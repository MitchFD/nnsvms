<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('users_login_information');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile/register', ['as' => 'profile.register', 'uses' => 'ProfileController@register']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
	Route::put('users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
	// Route::get('users/user_management/', ['as' => 'users.show', 'uses' => 'UsersController@show']);
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('violation_entry', ['as' => 'violation_entry', 'uses' => 'ViolationEntryController@index']);
	Route::get('violation_entry/fetch', ['as' => 'violation_entry.fetch', 'uses' => 'ViolationEntryController@fetch']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});