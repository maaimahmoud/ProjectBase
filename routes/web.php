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

Route::POST('/signUp', 'Accounts@signUp');

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

Route::get('/createAdmin', 'adminController@createAdmin');

Route::post('/newAdmin', 'adminController@newAdmin');

Route::get('/user/{username}','UserController@showProfile');

Route::get('/editprofile','UserController@editProfile');

Route::post('/editprofile','UserController@setUserPassword');

Route::get('/team/{teamID}','TeamController@showProfile');

Route::get('/statistics','StatisticsController@showStatistics');

Route::get('/');

Route::get('/searchWalkThrough/{searchValue}', 'searchController@searchWalkThrough');

Route::get('/projectsub', function () {
    return view('ProjectSub');
}); 

Route::get('/WaitAdmin', function () {
    return view('WaitAdmin');
}); 

Route::post('/searchProjectProfile','projectController@searchGetProject');

Route::get('projectProfile/{tid}/{pname}','projectController@getproject');

Route::get('{username}/addproject','projectController@addproject');

Route::post('/{username}/createteam','projectController@createteam');

Route::post('/{username}/submit','projectController@submitproj');
// Route::get('/createteam',function () {
//     echo "complete nonsense";});
Route::get('/','Accounts@getCourses');

Route::POST('/signIn','Accounts@signIn');

Route::get('/signOut','Accounts@signOut');

Route::post('/listOfProjects', 'Accounts@getProjects');

Route::get('/managedCourses', 'Accounts@getCoursesManagedByAdmin');

Route::post('/projectApproved', 'Accounts@setProjectApproved');