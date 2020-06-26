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

// Profile Group
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile/register', ['as' => 'profile.register', 'uses' => 'ProfileController@register']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// Users Group
Route::group(['middleware' => 'auth'], function(){
	Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
	Route::put('users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
	// Route::get('users/user_management/', ['as' => 'users.show', 'uses' => 'UsersController@show']);
});

// Violation Entry Group
Route::group(['middleware' => 'auth'], function(){
	Route::get('violation_entry', ['as' => 'violation_entry', 'uses' => 'ViolationEntryController@index']);
	Route::get('violation_entry/fetch', ['as' => 'violation_entry.fetch', 'uses' => 'ViolationEntryController@fetch']);
	Route::get('violation_entry/form', ['as' => 'violation_entry.form', 'uses' => 'ViolationEntryController@form']);
	Route::put('violation_entry/record', ['as' => 'violation_entry.record', 'uses' => 'ViolationEntryController@record']);
});

// Dashboard
Route::group(['middleware' => 'auth'], function(){
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
});

// Violation Records Group
Route::group(['middleware' => 'auth'], function(){
	Route::get('violation_records', ['as' => 'violation_records', 'uses' => 'ViolationRecordsController@index']);
	Route::get('violation_records/student/{student_id}', ['as' => 'violation_records/student/{student_id}', 'uses' => 'ViolationRecordsController@student']);
});

// Page Redirects
Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});