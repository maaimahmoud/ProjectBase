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

Route::get('/createAdmin', function(){
    return view('admin.createAdmin');
});

Route::post('/newAdmin', 'adminController@newAdmin');

Route::get('/user/{username}','UserController@showProfile');

Route::get('/editprofile','UserController@editProfile');

Route::post('/editprofile','UserController@setUserPassword');

Route::get('/team/{teamID}','TeamController@showProfile');

Route::get('/statistics','StatisticsController@showStatistics');

// Route::get('/adminNote', function(){
//     return view('admin.notification');
// });

Route::get('/projectProfile', function () {
    return view('projectProfile');
});

Route::get('/projectsub', function () {
    return view('ProjectSub');
}); 

Route::get('/WaitAdmin', function () {
    return view('WaitAdmin');
}); 

Route::get('projectProfile/{tid}/{pname}','projectController@getproject');

Route::get('{username}/addproject','projectController@addproject');

Route::post('/{username}/createteam','projectController@createteam');

Route::post('/{username}/submit','projectController@submitproj');
// Route::get('/createteam',function () {
//     echo "complete nonsense";});
