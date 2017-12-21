<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{

    public function search(Request $request){
        $searchValue = $request->search_value;
        $searchResult = array();

        if($request->search_combo === 'proname'){
            $searchResult = searchController::searchProjectName($searchValue);
        }
        elseif ($request->search_combo === 'tname'){
            $searchResult = searchController::searchTeamName($searchValue);
        }
        elseif ($request->search_combo === 'year'){
            $searchResult = searchController::searchYear($searchValue);
        }
        elseif ($request->search_combo === 'cname'){
            $searchResult = searchController::searchCourseName($searchValue);
        }
        elseif ($request->search_combo === 'ccode'){
            $searchResult = searchController::searchCourseCode($searchValue);
        }
        elseif ($request->search_combo === 'dname'){
            $searchResult = searchController::searchDepartmentName($searchValue);
        }
        elseif ($request->search_combo === 'dcode'){
            $searchResult = searchController::searchDepartmentCode($searchValue);
        }

        $searchResult = array_map("unserialize", array_unique(array_map("serialize", $searchResult)));

        if (count($searchResult) != 0){
            return view('search', compact('searchResult'));
        }
        else{
            return view('search');
        }
    }

    private function searchProjectName($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT * FROM PROJECT WHERE Name Like ?");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }

    private function searchTeamName($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT p.Name,TID,Supervisor,Year,Ccode,Demo,VideoLink,Document,Logo
                                    FROM PROJECT as p, TEAM as t
                                    WHERE t.ID = p.TID AND t.Name Like ?");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }

    public function searchCourseName($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT P.Name,TID,Supervisor,p.Year,p.Ccode,Demo,VideoLink,Document,Logo
                                    FROM PROJECT as p, (SELECT c.code,c.Name,pt.Year
                                                        FROM PROJECT_REQUIREMENT as pt,COURSE as c 
                                                        WHERE pt.Ccode = c.code) as ptc
                                    WHERE p.Ccode = ptc.code AND p.Year = ptc.Year AND ptc.Name Like ?");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }

    private function searchDepartmentName($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT P.Name,TID,Supervisor,p.Year,p.Ccode,Demo,VideoLink,Document,Logo
                                    FROM PROJECT as p, (SELECT cd.code,pt.Year
                                                        FROM PROJECT_REQUIREMENT as pt,(SELECT c.code
                                                                                        FROM COURSE as c, DEPARTMENT as d
                                                                                        WHERE c.DeptCode = d.code AND d.Name Like ?) as cd
                                                        WHERE pt.Ccode = cd.code) as ptcd
                                    WHERE p.Ccode = ptcd.code AND p.Year = ptcd.Year");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }

    private function searchCourseCode($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT * FROM PROJECT WHERE Ccode Like ?");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }

    private function searchDepartmentCode($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT P.Name,TID,Supervisor,p.Year,p.Ccode,Demo,VideoLink,Document,Logo
                                    FROM PROJECT as p, (SELECT c.code,pt.Year
                                                        FROM PROJECT_REQUIREMENT as pt,COURSE as c 
                                                        WHERE pt.Ccode = c.code AND c.DeptCode Like ?) as ptc
                                    WHERE p.Ccode = ptc.code AND p.Year = ptc.Year");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }

    private function searchYear($searchValue)
    {
        $con = DB::connection()->getPdo();
        
        $searchValues = array();

        for($i = 2; $i <= strlen($searchValue); $i++){
            $searchValues[] = '%' . (str_split($searchValue, $i))[0] . '%';
        }
        
        $searchValues = array_reverse ($searchValues);

        $searchResult = array();

        foreach ($searchValues as $value){
            $stmt = $con->prepare("SELECT * FROM PROJECT WHERE Year Like ?");
            $stmt->execute(array($value));
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            $searchResult = array_merge($searchResult, $row);
        }
        return $searchResult;
    }
}