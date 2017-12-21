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

Route::get('/newProject', 'projectController@submitProject');

Route::get('/search', function () {
    return view('search.search');
});

Route::get('/projectProfile', function () {
    return view('projectProfile');
});

Route::get('/projectsub', function () {
    return view('ProjectSub');
}); 

Route::get('/WaitAdmin', function () {
    return view('search.WaitAdmin');
}); 
Route::get('projectProfile/{tid}/{pname}','projectController@getproject');

Route::get('{username}/addproject','projectController@addproject');

Route::post('/{username}/createteam','projectController@createteam');

Route::post('/{username}/submit','projectController@submitproj');
// Route::get('/createteam',function () {
//     echo "complete nonsense";});