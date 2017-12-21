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

Route::get('/', function () {
    return view('index');
});

Route::post('/searchpage', function () {
    return view('search');
});

Route::get('/searchpage', function () {
    return view('search');
});

Route::post('/search', 'searchController@search');

Route::get('/createProjectRequirment', 'adminController@getCreateRequirementData');

Route::post('/newRequirement', 'adminController@newRequirement');

Route::get('/createCourse', 'adminController@getCreateCourseData');

Route::post('/newCourse', 'adminController@newCourse');

Route::get('/adminNote', function(){
    return view('admin.notification');
});