<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TeamController extends Controller
{
     /*
    *   @summary A function to get team members usernames
    *  
    *   @parameter {int} [$teamID] team ID wanted to get members of
    *   @return array of usernames of the team members
    */
    public function getTeamMembers($teamID){
        $teamMembers = DB::select("SELECT * FROM forms_team WHERE TID = $teamID");
        return $teamMembers;
    }


    /*
    *   @summary A function to get list of projects done by team
    *  
    *   @parameter {int} [$teamID] team ID wanted to get projects of
    *   @return array of projects(Name,TID,Supervisor/Year/Ccode/Demo/VideoLink/Document/Logo) he has done
    */
    public function getTeamProjects($teamID){
        $projectsList = DB::select(
        "SELECT name,tid
         FROM PROJECT
         WHERE tid = $teamID");
        
        return $projectsList;
    }

    /*
    *   @summary A function to get list of projects done by team
    *  
    *   @parameter {int} [$teamID] team ID wanted to get projects of
    *   @return array of projects(Name,TID,Supervisor/Year/Ccode/Demo/VideoLink/Document/Logo) he has done
    */
    public function getTeamName($teamID){
        $teamName = DB::select(
        "SELECT Name
         FROM team
         WHERE ID = $teamID");
        
        if(count($teamName)>0)
        return array_values($teamName)[0]->Name;
        else
        return "NULL";
    }


    /*
    *   @summary A function to load view team's profile
    *  
    *   @parameter {int} [$teamID] team ID wanted to show profile of
    *   @return view of page (team/profile) 
    */
    public function showProfile($teamID){
        
        if(ctype_digit($teamID)){

        $teamMembers = TeamController::getTeamMembers($teamID);
        $teamName = TeamController::getTeamName($teamID);
        $projectsList = TeamController::getTeamProjects($teamID);
        return view('team.profile',compact('teamMembers','projectsList','teamName'));

        }
        else{
        $teamMembers = array();
        $teamName = NULL;
        $projectsList = array();
        return view('team.profile',compact('teamMembers','projectsList','teamName'));
        }
        
    }
}
