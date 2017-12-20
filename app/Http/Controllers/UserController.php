<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    
    /*
    *   @summary A function to get user's info
    *  
    *   @parameter {string} [$username] username wanted to get info of
    *   @return array of userInfo(username/email/FirstName/MiddleName/LastName/ExpectedGradYear)
    */
    public function getUserInfo($username){
        $userInfo = DB::select("SELECT * FROM STUDENT WHERE USERNAME = '$username'");
        return $userInfo;
    }


    /*
    *   @summary A function to get list of projects done by user
    *  
    *   @parameter {string} [$username] username wanted to get projects of
    *   @return array of projects(Name,TID,Supervisor/Year/Ccode/Demo/VideoLink/Document/Logo) he has done
    */
    public function getUserProjects($username){
        $projectsList = DB::select(
        "SELECT name,tid
         FROM PROJECT
         WHERE TID IN
            (SELECT TID 
             FROM FORMS_TEAM
             WHERE SUSERNAME = '$username')
        ");
        
        return $projectsList;
    }

    /*
    *   @summary A function to load view user's profile
    *  
    *   @parameter {string} [$username] username wanted to show profile of
    *   @return view of page (user/profile) 
    */
    public function showProfile($username){

        $userInfo = UserController::getUserInfo($username);
        $projectsList = UserController::getUserProjects($username);
        return view('user.profile',compact('userInfo','projectsList','username'));
    }



    /*
    *   @summary A function to SET user's password hashed
    *            it uses built-in hash function
    *
    *   @parameter {string} [$username] username wanted to SET password to
    *   @parameter {string} [$password] new password
    *   @return array of userInfo(username/email/FirstName/MiddleName/LastName/ExpectedGradYear)
    */
    // public function setUserPassword($username,$password){
    //     $hashedPassword = Hash::make('secret'); 

    // }
}
