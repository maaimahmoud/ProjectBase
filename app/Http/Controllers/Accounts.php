<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Crypt;
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


		$username='0';
		$firstName='0';

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
						 $encrypted = Crypt::encryptString($request->signup_password);

						 $stmt=$con->prepare("INSERT INTO `user`(`username`, `Password`) VALUES (?,?)");
						 $stmt->execute(array($request->signup_username,$encrypted));


					     $stmt = $con->prepare("INSERT INTO `student`(`username`, `email`, `FirstName`, `MiddleName`, `LastName`, `SEM/CREDIT`, `ExpectedGradYear`) VALUES (?,?,?,?,?,0,2020)");		     

						 $stmt->execute(array($request->signup_username,$request->signup_email,$request->signup_firstname,$request->signup_middlename,$request->signup_lastname));

					

						$username=$request->signup_username;
						$firstName=$request->signup_firstname;
					}
				}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Insert all fields so sign up")';
				echo '</script>';
			}
		}

		$AdminStudent='0';

		//return redirect('/')->with($username);
		return $this->getCourses($username,$firstName,$AdminStudent);
    }

    public function signIn(Request $request){


    	$con = DB::connection()->getPdo();

    	$firstName='0';
    	$username='0';

	    if (isset($request->login_username) && isset($request->login_password))
			{
					$stmt = $con->prepare("SELECT * FROM USER WHERE USERNAME = ?");
					$val=$request->login_username;
					$stmt->execute(array($val));
					$row = $stmt->fetchAll();
					$count = $stmt->rowCount();

					if ($count !== 0)
					{
						foreach ($row as $key) {
							# code...
							$decrypted = Crypt::decryptString($key['Password']);

							if (!($decrypted === $request->login_password))
								{
									echo '<script language="javascript">';
									echo 'alert("Password is incorrect")';
									echo '</script>';
									return view('index');
								}
								
						}

						$_SESSION['username']=$request->login_username;
						$stmt = $con->prepare("SELECT * FROM Student WHERE USERNAME = ?");
						$val=$request->login_username;
						$stmt->execute(array($val));
						$row = $stmt->fetchAll();
						$count = $stmt->rowCount();

						if ($count !== 0)
						{
							foreach ($row as $key) {
								$firstName=$key['FirstName'];
								$_SESSION['FirstName'] = $key['FirstName'];
							}
							$AdminStudent='0';
						
							//session()
						}
						else
						{
							$stmt = $con->prepare("SELECT * FROM ADMIN WHERE USERNAME = ?");
							$val=$request->login_username;
							$stmt->execute(array($val));
							$row = $stmt->fetchAll();
							$count = $stmt->rowCount();
							if ($count !== 0)
							{
								foreach ($row as $key) {
									$firstName='Admin';
									$username=$request->signup_username;
								}
								$AdminStudent='1';
							}
									//admin
						}	
						return redirect('/');
							
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
				
			
		//$username=$request->login_username;
		//$firstName=$request->login_firstName;

		//return redirect('/')->with($username);
			
		 return $this->getCourses($username,$firstName,$AdminStudent);

	}



	     function getCourses($username='0',$firstName='0',$AdminStudent='0'){

	   	   
			// $_SESSION["username"] = $username;
			// $_SESSION["firstName"]=$firstName;
			// $_SESSION["AdminStudent"]=$AdminStudent;
	   	   


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
		session_destroy();
		return $this->getCourses('0','0');
	}

}
