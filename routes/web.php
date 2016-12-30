<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Front
Route::get('/', function (){return view('front/index');});
Route::get('/events', function (){return view('front/events');});
Route::get('/officers', function (){return view('front/officers');});
Route::get('/jrofficers', function (){return view('front/jrofficers');});

//Back
Route::get('/apps', function (){return view('back/index');});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/profile', 'UserController@ShowProfile');
  Route::post('/profile', 'UserController@UpdateProfile');
});

//Authentication
Route::get('auth/login', 'Auth\AuthController@CASLogin');
Route::get('auth/logout', 'Auth\AuthController@Logout');
Route::get('auth/caslogout', 'Auth\AuthController@CASLogout');
