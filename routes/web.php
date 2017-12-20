<?php

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

Route::get('/','getCourses@getCourses');


Route::get('/search', function () {
    return view('search.search');
});

Route::get('/user/{username}','UserController@showProfile');

Route::get('/team/{teamID}','TeamController@showProfile');

Route::get('/statistics','StatisticsController@showStatistics');
