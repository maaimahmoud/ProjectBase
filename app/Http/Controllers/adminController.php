<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;

class adminController extends Controller
{

    public function createAdmin(){
        if (!Session::has('isTA')){
            return redirect('/');
        }

        $con = DB::connection()->getPdo();
        
        $stmt = $con->prepare("SELECT code FROM COURSE WHERE 1");
        $stmt->execute(array());
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();

        $courses = $row;

        return view('admin.createAdmin', compact('courses'));
    }

    private function getAdminCourses(){
        if (!Session::has('isTA')){
            return redirect('/');
        }
        $username = session('usename');
        $con = DB::connection()->getPdo();

        $stmt = $con->prepare("SELECT distinct Ccode FROM ADMIN,ADMIN_MANAGES WHERE username = ?");
        $stmt->execute(array($admin_username));
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();

        return $row;
    }

    public function getCreateRequirementData(){
        if (!Session::has('isTA')){
            return redirect('/');
        }
        $adminCourses = adminController::getAdminCourses();
        return view('admin.createRequirement', compact('adminCourses'));
    }

    public function newRequirement(Request $request){
        if (!Session::has('isTA')){
            return redirect('/');
        }
       $con = DB::connection()->getPdo();
       $name = $request->req_name;
       $year = $request->req_year;
       $description = $request->req_descreption;
       $ccode = $request->ccode;

       $stmt = $con->prepare("SELECT * FROM PROJECT_REQUIREMENT WHERE year = ? AND Ccode = ?");
       $stmt->execute(array($year, $ccode));
       $row = $stmt->fetchAll();
       $count = $stmt->rowCount();

       if(!isset($row) || count($row) == 0){
            $stmt = $con->prepare("INSERT INTO PROJECT_REQUIREMENT(name, year, description, ccode) VALUES(:zname, :zyear, :zdescription, :zccode)");
            $stmt->execute(array(
                'zname' => $name,
                'zyear' => $year,
                'zdescription' => $description,
                'zccode' => $ccode,
            ));
            $note = ['project requirement was added successfully', 'Go To dashboard', '/'];
            return view('admin.notification', compact('note'));
        }
        else{
            $note = ['project requirement already exsist', 'Create Project Requirement', '/createProjectRequirment'];
            return view('admin.notification', compact('note'));
        }
    }

    private function getDepartments(){
        $con = DB::connection()->getPdo();
        $stmt = $con->prepare("SELECT code FROM DEPARTMENT  WHERE 1");
        $stmt->execute(array());
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();

        return $row;
    }

    public function getCreateCourseData(){
        if (!Session::has('isTA')){
            return redirect('/');
        }
        $Departments = adminController::getDepartments();
        return view('admin.CreateCourse', compact('Departments'));
    }

    public function newCourse(Request $request){
        if (!Session::has('isTA')){
            return redirect('/');
        }
        $con = DB::connection()->getPdo();
        $deptcode = $request->dept_code;
        $code = $deptcode . $request->code;
        $name = $request->name;
        $description = $request->req_descreption;

        $stmt = $con->prepare("SELECT * FROM COURSE WHERE code = ?");
        $stmt->execute(array($code));
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();
 
        if(!isset($row) || count($row) == 0){
            $stmt = $con->prepare("INSERT INTO COURSE(code, deptcode, name, description) VALUES(:zcode, :zdeptcode, :zname, :zdescription)");
            $stmt->execute(array(
                'zcode' => $code,
                'zdeptcode' => $deptcode,
                'zname' => $name,
                'zdescription' => $description,
            ));
            $note = ['course was added successfully', 'Go To dashboard', '/'];
            return view('admin.notification', compact('note'));
        }
        else{
            $note = ['course already exsist', 'Create Course', '/createCourse'];
            return view('admin.notification', compact('note'));
        }
    }

    public function newAdmin(Request $request){
        if (!Session::has('isTA')){
            return redirect('/');
        }
        $con = DB::connection()->getPdo();
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $st_ta = (int)$request->st_ta;
        $courses = $request->courses;
        
        $hashed = Hash::make($password);

        $stmt = $con->prepare("SELECT * FROM ADMIN WHERE username = ?");
        $stmt->execute(array($username));
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();

        $stmt = $con->prepare("SELECT * FROM ADMIN WHERE email = ?");
        $stmt->execute(array($email));
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();
 
        if(!isset($row) || count($row) == 0){
            $stmt = $con->prepare("INSERT INTO USER(username, password) VALUES(:zusername, :zpassword)");
            $stmt->execute(array(
                'zusername' => $username,
                'zpassword' => $hashed,
            ));

            $stmt = $con->prepare("INSERT INTO ADMIN(username, email, STIN) VALUES(:zusername, :zemail, :zst_in)");
            $stmt->execute(array(
                'zusername' => $username,
                'zemail' => $email,
                'zst_in' => $st_ta,
            ));

            foreach($courses as $course){
                $stmt = $con->prepare("INSERT INTO ADMIN_MANAGES(Ausername, year, Ccode) VALUES(:zusername, :zyear, :Ccode)");
                $stmt->execute(array(
                    'zusername' => $username,
                    'zyear' => 2020,
                    'Ccode' => $course,
                ));    
            }
                
            $note = ['admin was added successfully', 'Go To dashboard', '/'];
            return view('admin.notification', compact('note'));
        }
        else{
            $note = ['admin already exsist', 'Create Admin', '/createAdmin'];
            return view('admin.notification', compact('note'));
        }
    }
}