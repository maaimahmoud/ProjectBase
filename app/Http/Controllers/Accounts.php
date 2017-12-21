<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Hash;
use Illuminate\Support\Facades\Session;



class Accounts extends Controller
{
    //
    public function signUp(Request $request){

    	$con = DB::connection()->getPdo();

		$stmt = $con->prepare("SELECT * FROM USER WHERE USERNAME = ?");
		$val=$request->signup_username;
		$stmt->execute(array($val));
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();

		if ($count !== 0)
		{
				echo '<script language="javascript">';
				echo 'alert("Username Already exists")';
				echo '</script>';
		}
		else{

	    	if (isset($request->signup_username) && isset($request->signup_email) && isset($request->signup_firstname) && isset($request->signup_middlename) && isset($request->signup_lastname) && isset($request->signup_password) && isset($request->signup_password_confirm))
				{
					if ($request->signup_password !== $request->signup_password_confirm)
					{
						echo '<script language="javascript">';
						echo 'alert("Passwords do not match")';
						echo '</script>';
					}
					else
					{
						 $hashed = Hash::make($request->signup_password);

						 $stmt=$con->prepare("INSERT INTO `user`(`username`, `Password`) VALUES (?,?)");
						 $stmt->execute(array($request->signup_username,$hashed));


					     $stmt = $con->prepare("INSERT INTO `student`(`username`, `email`, `FirstName`, `MiddleName`, `LastName`, `ExpectedGradYear`) VALUES (?,?,?,?,?,?)");		     

						 $stmt->execute(array($request->signup_username,$request->signup_email,$request->signup_firstname,$request->signup_middlename,$request->signup_lastname, $request->signup_egy));

					

						Session::put('username',$request->signup_username);
						Session::put('firstName',$request->signup_firstname);
						return redirect('/');
					}
				}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Insert all fields so sign up")';
				echo '</script>';
			}
		}
		return redirect('/');
    }

    
    public function signIn(Request $request){

    	$con = DB::connection()->getPdo();

	    if (isset($request->login_username) && isset($request->login_password))
			{
					$stmt = $con->prepare("SELECT * FROM USER WHERE USERNAME = ?");
					$val=$request->login_username;
					$stmt->execute(array($val));
					$row = $stmt->fetchAll();
					$count = $stmt->rowCount();

				if ($count !== 0)
				{	//username found
					foreach ($row as $key) {
						# code...
						if (Hash::check($request->login_password, $key['Password']))
						{
							// The passwords match...

							$stmt = $con->prepare("SELECT * FROM Student WHERE USERNAME = ?");
							$val=$request->login_username;
							$stmt->execute(array($val));
							$row = $stmt->fetchAll();
							$count = $stmt->rowCount();

							if ($count !== 0)
							{ //is student
								foreach ($row as $key) {
									$firstName=$key['FirstName'];
									$username=$request->login_username;

									Session::put('username', $username);
									Session::put('firstName', $firstName);
								}
								
							}
							else
							{ //check if admin
								$stmt = $con->prepare("SELECT * FROM ADMIN WHERE USERNAME = ?");
								$val=$request->login_username;
								$stmt->execute(array($val));
								$row = $stmt->fetchAll();
								$count = $stmt->rowCount();
								if ($count !== 0)
								{
									foreach ($row as $key) {
										$firstName='Admin';
										$username=$request->login_username;
										$isTA = $key['STIN'];
										Session::put('username', $username);
										Session::put('firstName', $firstName);
										if($isTA==1)
										Session::put('isTA',1);
									}
									
									Session::put('isAdmin', '1');
								}
							}	
							return redirect('/');
							}
						else
							{
							
								echo '<script language="javascript">';
								echo 'alert("incorrect password")';
								echo '</script>';
				
							}
						}

							
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("Username does not exist")';
						echo '</script>';
					}
			}
					

			else
				{
					echo '<script language="javascript">';
					echo 'alert("Insert all fields to sign in")';
					echo '</script>';
				}

		}



	    function getCourses(){

        $con = DB::connection()->getPdo();
		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP1%' And Term=1");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();

		$coursesYear1Term1 = array();

		if (isset($row)){
		    $coursesYear1Term1 = $row;
		}

		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP1%' And Term=2");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear1Term2 = array();

		if (isset($row)){
		    $coursesYear1Term2 = $row;
		}

$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP2%' And Term=1");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear2Term1 = array();

		if (isset($row)){
		    $coursesYear2Term1 = $row;
		}

		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP2%' And Term=2");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear2Term2 = array();

		if (isset($row)){
		    $coursesYear2Term2 = $row;
		}

		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP3%' And Term=1");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear3Term1 = array();

		if (isset($row)){
		    $coursesYear3Term1 = $row;
		}

		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP3%' And Term =2 ");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear3Term2 = array();

		if (isset($row)){
		    $coursesYear3Term2 = $row;
		}

		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP4%' And Term=1");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear4Term1 = array();

		if (isset($row)){
		    $coursesYear4Term1 = $row;
		}

		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE Code Like 'CMP4%' And Term=2");
		$stmt->execute();
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesYear4Term2 = array();

		if (isset($row)){
		    $coursesYear4Term2 = $row;
		}

		return view('index', compact('coursesYear1Term1','coursesYear1Term2','coursesYear2Term1','coursesYear2Term2','coursesYear3Term1','coursesYear3Term2','coursesYear4Term1','coursesYear4Term2','username','firstName'));
	}

	function signOut(){
		Session::flush();
		return redirect('/');
	}


	function getCoursesManagedByAdmin(){

		$data = session()->all();

		if (!isset($_SESSION)) {
			session_start();
			$_SESSION["username"]=$data["username"];
			$_SESSION["firstName"]=$data["firstName"];
			$_SESSION["AdminStudent"]=$data["AdminStudent"];

		}

		$con = DB::connection()->getPdo();

		$stmt=$con->prepare("SELECT Code,Name FROM course,admin_manages WHERE Ccode=Code AND Ausername=? AND YEAR= ?");
		$val=$_SESSION["username"];
		$val2=date('Y');
		$stmt->execute(array($val,$val2));
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesManagedByAdmin = array();

		if (isset($row)){
		    $coursesManagedByAdmin = $row;
		}


		return view('Admin/managedCourses',compact('coursesManagedByAdmin'));
	}

	public function getProjects(Request $request){

		$data = session()->all();

		if (!isset($_SESSION)) {
			session_start();
			$_SESSION["username"]=$data["username"];
			$_SESSION["firstName"]=$data["firstName"];
			$_SESSION["AdminStudent"]=$data["AdminStudent"];

		}

		$con = DB::connection()->getPdo();

		$stmt=$con->prepare("SELECT Code,Name FROM course,admin_manages WHERE Ccode=Code AND Ausername=? AND YEAR= ?");
		$val=$_SESSION["username"];
		$val2=date('Y');
		$stmt->execute(array($val,$val2));
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesManagedByAdmin = array();

		if (isset($row)){
		    $coursesManagedByAdmin = $row;
		}

		
		$stmt=$con->prepare("SELECT * FROM project WHERE Ccode=? AND Year=?");
		$val=$request->course;
		$val2=date('Y');
		$stmt->execute(array($val,$val2));
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$coursesList = array();

		if (isset($row)){
		    $coursesList = $row;
		}

		return view('Admin/managedCourses',compact('coursesManagedByAdmin','coursesList'));
	}

	public function setProjectApproved(request $request,$teamID,$projectName){

		$con = DB::connection()->getPdo();

		$stmt=$con->prepare("UPDATE `project` SET `approved`=1 WHERE Name=? AND TID=? ");
		$val=intval($teamID);
		$stmt->execute(array($projectName,$val));
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();

		return $this->getCoursesManagedByAdmin();

		
	}

}
