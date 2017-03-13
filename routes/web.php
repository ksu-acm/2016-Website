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
Route::get('/sponsors', 'FrontController@Sponsors');

//Back
Route::group(['middleware' => 'auth'], function () {
  Route::get('/apps', 'BackController@Index');

  Route::get('/apps/food', 'FoodController@ShowFood');
  Route::get('/apps/order', 'FoodController@ShowOrder');
  Route::post('/apps/order', 'FoodController@Order');
  Route::get('/apps/event/{id?}', 'FoodController@ShowEvent');
  Route::post('/apps/event/{id}', 'FoodController@UpdateEvent');
  Route::post('/apps/delete/event/{id}', 'FoodController@DeleteEvent');

  Route::get('/apps/attendance', 'EventController@Events');
  Route::get('/apps/attendance/analytics', 'EventController@Analytics');
  Route::get('/apps/attendance/{EventID?}', 'EventController@ShowEvent');
  Route::post('/apps/attendance/{EventID}', 'EventController@EditEvent');
  Route::post('/apps/delete/attendance/{id}', 'EventController@DeleteEvent');
  Route::get('/apps/cardswiper', 'EventController@CardSwiper');
  Route::get('/apps/cardswiper', 'EventController@Swipe');

  #Route::get('/apps/profile/{eid?}', 'UserController@ShowProfile');
  #Route::post('/apps/profile/{eid}', 'UserController@UpdateProfile');
  Route::get('/apps/profile/{eid?}', ['uses' => 'UserController@ShowProfile', 'roles' => ['User', 'Administrator']]);
  Route::post('/apps/profile/{eid}', ['uses' => 'UserController@UpdateProfile', 'roles' => ['User', 'Administrator']]);

  #Route::get('/apps/admin', 'AdminController@Admin');
  Route::get('/apps/admin', ['uses' => 'AdminController@Admin', 'roles' => ['Administrator']]);

});

//Authentication
Route::get('/login', 'Auth\AuthController@CASLogin');
Route::get('auth/login', 'Auth\AuthController@CASLogin');
Route::get('auth/logout', 'Auth\AuthController@Logout');
Route::get('auth/caslogout', 'Auth\AuthController@CASLogout');
