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
    return view('auth/login');
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

// Users Management Group
Route::group(['middleware' => 'auth'], function(){
	Route::get('users_management', ['as' => 'users_management', 'uses' => 'UsersController@index']);
	Route::post('users/verify_email', ['as' => 'users.verify_email', 'uses' => 'UsersController@verify_email']);
	Route::put('users/create_employee_user', ['as' => 'users.create_employee_user', 'uses' => 'UsersController@create_employee_user']);
	Route::put('users/create_student_user', ['as' => 'users.create_student_user', 'uses' => 'UsersController@create_student_user']);
	Route::get('users_management/user/{user_id}', ['as' => 'users_management.user', 'uses' => 'UsersController@user']);
	Route::put('users/create_user_role', ['as' => 'users.create_user_role', 'uses' => 'UsersController@create_user_role']);
	Route::get('users/edit_user_role', ['as' => 'users.edit_user_role', 'uses' => 'UsersController@edit_user_role']);
	Route::get('users/update_user_role', ['as' => 'users.update_user_role', 'uses' => 'UsersController@update_user_role']);
	Route::get('users/remove_user_role', ['as' => 'users.remove_user_role', 'uses' => 'UsersController@remove_user_role']);
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
	Route::get('violation_records/student_records/{student_id}', ['as' => 'student_records', 'uses' => 'ViolationRecordsController@student_records']);
});

// sanction Group
Route::group(['middleware' => 'auth'], function(){
	Route::get('sanction/save', ['as' => 'sanction.save', 'uses' => 'ViolationRecordsController@index']);
});

// Page Redirects
Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});