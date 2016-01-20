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
Route::get('/', 'WelcomeController@index');
Route::get('contact', 'WelcomeController@contact');
Route::post('test', 'TestController@submitTest');
Route::get('test', 'TestController@takedefaulttest');
Route::get('test/viewRecords', 'TestController@testinterp');
Route::get('test/addTestQuestion', 'TestController@addTestQuestion');

/*
* Register Admin routes
*/
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
* Login Admin routes
*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

/*
* Logout Admin route
*/
Route::get('auth/logout', 'Auth\AuthController@getLogout');

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

Route::group(['middleware' => ['web']], function () {
    //
});
