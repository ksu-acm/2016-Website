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
Route::get('/', 'FrontController@Index');
Route::get('/events', 'FrontController@Events');
Route::get('/officers', 'FrontController@Officers');
Route::get('/jrofficers', 'FrontController@JrOfficers');

//Back
Route::get('/apps', 'BackController@Index');
Route::get('/food', 'FoodController@ShowFood');
Route::get('/order', 'FoodController@ShowOrder');
Route::post('/order', 'FoodController@Order');
Route::get('/attendance', 'EventController@Events');



Route::group(['middleware' => 'auth'], function () {
  Route::get('/profile/{eid?}', 'UserController@ShowProfile');
  Route::post('/profile/{eid}', 'UserController@UpdateProfile');

  Route::get('/event/{id?}', 'FoodController@ShowEvent');
  Route::post('/event/{id}', 'FoodController@UpdateEvent');

  Route::post('/delete/event/{id}', 'FoodController@DeleteEvent');

  Route::get('/admin', 'AdminController@Admin');

  Route::get('/attendance/{EventID?}', 'EventController@ShowEvent');
  Route::post('/attendance/{EventID}', 'EventController@EditEvent');
});

//Authentication
Route::get('/login', 'Auth\AuthController@CASLogin');
Route::get('auth/login', 'Auth\AuthController@CASLogin');
Route::get('auth/logout', 'Auth\AuthController@Logout');
Route::get('auth/caslogout', 'Auth\AuthController@CASLogout');
