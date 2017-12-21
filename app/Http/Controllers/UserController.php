<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class UserController extends Controller
{
    
    /*
    *   @summary A function to get user's info
    *  
    *   @parameter {string} [$username] username wanted to get info of
    *   @return array of userInfo(username/email/FirstName/MiddleName/LastName/ExpectedGradYear)
    */
    private function getUserInfo($username){
        $userInfo = DB::select("SELECT * FROM STUDENT WHERE USERNAME = '$username'");
        return $userInfo;
    }


    /*
    *   @summary A function to get list of projects done by user
    *  
    *   @parameter {string} [$username] username wanted to get projects of
    *   @return array of projects(Name,TID) he has done
    */
    private function getUserProjects($username){
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
    *   @summary An utility function to SET user's password hashed
    *            it uses built-in hash function
    *
    *   @parameter {string} [$username] username wanted to SET password to
    *   @parameter {string} [$password] new password
    *   
    */
    private function setPassword($username,$password){
        DB::update("UPDATE USER SET Password = '$password' WHERE username = '$username'" );
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
    *   @parameter {request} [$password/$Confirm password] 
    *   
    */
    public function setUserPassword(Request $request){

        //if he logged in
        if(isset($_SESSION['username'])){

            //refresh if he pressed submit without 
           $this->validate($request,[
            'password' => 'required',
            'confirmPassword'=>'required'
           ]);
            
           //if passwords aren't identical
           if($request->password!==$request->confirmPassword)
           return view('user.editprofile')->with('msg',"The entered password aren't identical");

           //if password is less than 8 characters
           else if(strlen($request->password)<8)
           return view('user.editprofile')->with('msg',"Password should be 8 characters at least");

           //password is ready for changing
           else
           {

            $hashedPassword = Hash::make($request->password);
            UserController::setPassword($_SESSION['username'],$hashedPassword);
            return view('user.editprofile')->with('msg',"Password changed succefully");

           }

        }
        else

        return redirect('/');
           
    }

    public function editProfile(){
        
        if(isset($_SESSION['username'])){

            return view('user.editprofile');

        }
        else

        return redirect('/');
    }
}
