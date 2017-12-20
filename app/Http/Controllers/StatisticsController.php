<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use stdClass;
use DB;

class StatisticsController extends Controller
{

    /*
    *   @summary A function to get total number of students
    *  
    *   
    *   @return int total number of students
    */
    private function getUsersCount(){
        $query = DB::select("Select Count(*) as total From student");
        $val = array_values($query)[0]->total;
        return $val;
    }

    /*
    *   @summary A function to get total number of courses
    *  
    *   
    *   @return int total number of courses
    */
    private function getCoursesCount(){
        $query = DB::select("Select Count(*) as total From course");
        $val = array_values($query)[0]->total;
        return $val;
    }

    /*
    *   @summary A function to get total number of projects
    *  
    *   
    *   @return int total number of projects
    */
    private function getProjectsCount(){
        $query = DB::select("Select Count(*) as total From project");
        $val = array_values($query)[0]->total;
        return $val;
    }

    /*
    *   @summary A function to get the team with most number of projects
    *  
    *   
    *   @return stdObject(string name,int tid,int bestTeamCount) name of best team,team id,count of projects done by the team
    */
    private function getBestTeam(){
        $query = DB::select(
            "SELECT t.name,tid, COUNT(tid) as bestTeamCount
            FROM team as t,project as p
            Where t.id = p.tid
            GROUP BY t.name,tid
            ORDER BY bestTeamCount DESC");

        if(count($query)>0){
        $val = array_values($query)[0];
        return $val;
        }

        else{
        $val = new stdClass;
        $val -> name = 'NULL';
        $val -> tid = 0;
        $val -> bestTeamCount = 0; 
        return $val;
        }
    }

    /*
    *   @summary A function to get the user with most number of projects
    *  
    *   
    *   @return stdObject(string username,int bestUserCount) username of best user,count of projects done by the user
    */
    private function getBestUser(){
        $query = DB::select(
            "SELECT s.username,COUNT(s.username) as bestUserCount
                From student as s,forms_team as t ,project as p
                Where username = t.Susername AND t.TID = p.TID
                GROUP BY s.username
                ORDER BY bestUserCount DESC");
        
        if(count($query)>0){
        $val = array_values($query)[0];
        return $val;
        }
        
        else{
            $val = new stdClass;
            $val -> username = 0;
            $val -> bestUserCount = 0; 
            return $val;
            }
    }

    /*
    *   @summary A function to show Statistics data
    *  
    *   
    *   @return view of statistics(total number of users,total number of courses,total number of projects
    *                              team with most number of projects,user with most number of projects)
    */
    public function showStatistics(){

        $usersCount = StatisticsController::getUsersCount();
        $coursesCount = StatisticsController::getCoursesCount();

        $bestTeam = StatisticsController::getBestTeam();
        $bestTeamName = $bestTeam->name;
        $bestTeamID = $bestTeam->tid;
        $bestTeamCount = $bestTeam->bestTeamCount;

        $bestUser = StatisticsController::getBestUser();
        $bestUserUsername = $bestUser->username;
        $bestUserCount = $bestUser->bestUserCount;
        
        $projectsCount = StatisticsController::getProjectsCount();

        return view('statistics',compact('usersCount','coursesCount','bestTeamID',
                                        'bestTeamName','bestTeamCount','bestUserUsername',
                                        'bestUserCount','projectsCount'));

    }

 
}
