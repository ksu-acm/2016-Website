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
  Route::get('/apps/events', ['uses' => 'BackController@Events', 'roles' => ['ACM Officer', 'ACM Advisor', 'Administrator']]);
  Route::get('/apps/event/{id?}', ['uses' => 'BackController@Event', 'roles' => ['ACM Officer', 'ACM Advisor', 'Administrator']]);
  Route::post('/apps/event/{id?}', ['uses' => 'BackController@UpdateEvent', 'roles' => ['ACM Officer', 'ACM Advisor', 'Administrator']]);
  Route::post('/apps/event/{id}/delete', ['uses' => 'BackController@DeleteEvent', 'roles' => ['ACM Officer', 'ACM Advisor', 'Administrator']]);

  Route::get('/apps/profile/{eid?}', ['uses' => 'BackController@Profile', 'roles' => ['User', 'Administrator']]);
  Route::post('/apps/profile/{eid?}', ['uses' => 'BackController@UpdateProfile', 'roles' => ['User', 'Administrator']]);

  Route::get('/apps/admin', ['uses' => 'AdminController@Admin', 'roles' => ['Administrator']]);

});

//Authentication
Route::get('/login', 'Auth\AuthController@CASLogin');
Route::get('auth/login', 'Auth\AuthController@CASLogin');
Route::get('auth/logout', 'Auth\AuthController@Logout');
Route::get('auth/caslogout', 'Auth\AuthController@CASLogout');
