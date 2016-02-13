<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
	
	// Login/Logout User routes
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	// Register User routes
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	// Home Page
	Route::get('/', 'TestController@takedefaulttest');

	// Take/Submit Test
	Route::get('test', 'TestController@takedefaulttest');
	Route::post('test', 'TestController@submitTest');

	// Interpret results
	Route::get('test/viewRecords', 'TestController@testinterp');

	// Add Question
	
	// Get all or one student results
	Route::get('records', 'TestController@takedefaulttest');
	Route::get('records/{id_number}', 'TestController@getStudentRecord');

	// Logout
	Route::get('logout', 'TestController@logout');

	//Admin
	Route::get('test/addQuestion', 'TestController@addTestQuestion');
	Route::post('test/addQuestion', 'TestController@submitAddQuestion');
	Route::get('test/addtitle', 'TestController@addTestTitle');
	Route::post('test/addtitle/', 'TestController@submitTestTitle');
	Route::post('/test/addTitle1/{id}', 'TestController@submitEditTitle');
	Route::post('test/addQuestion1/{id}', 'TestController@submitEditQuestion');


	
});
