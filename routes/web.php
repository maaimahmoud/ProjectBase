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

Route::get('/','Accounts@getCourses');

Route::POST('/signIn','Accounts@signIn');

Route::get('/signOut','Accounts@signOut');

Route::get('/managedCourses',function(){
	return view('Admin/managedCourses');
});