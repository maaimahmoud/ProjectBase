<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    // echo '<pre>';
    // print_r($arrayName);
    // echo '</pre>';

     public function getproject($tid,$pname)
     {
 
     	$projectphotos= array();
     	$projecttools= array();
     	$projectinst= array();
     	$projectdata= array();
      $projectteam=array();
     	$class=array();
      $projectcourse=array();

      
      $con = DB::connection()->getPdo();
        $rows = $con->prepare("SELECT * FROM PROJECT WHERE Name = ? AND TID = ?");
       $rows->execute(array($pname,$tid));
       $projectdata=$rows->fetchAll();
      // echo '<pre>';
      //   print_r($projectdata);
      //   print(count($projectdata));
      // echo '</pre> ';
       if(count($projectdata)>0)
       {


       $rows = $con->prepare("SELECT PHOTOS FROM PHOTOS WHERE PName = ? AND TID = ?");
       $rows->execute(array($pname,$tid));
       $projectphotos=$rows->fetchAll();
     	// echo '<pre>';
  	  	// print_r($projectphotos);
   	 	// echo '</pre> ';

       $rows = $con->prepare("SELECT TOOLS FROM TOOLS WHERE PName = ? AND TID = ?");
       $rows->execute(array($pname,$tid));
       $projecttools=$rows->fetchAll();
     //    echo '<pre>';
   		// print_r($projecttools);
   		// echo '</pre> ';

	   $rows = $con->prepare("SELECT SUPERVISOR FROM PROJECT WHERE Name = ? AND TID = ?");
       $rows->execute(array($pname,$tid));
       $projectsup=$rows->fetchAll();
     //    echo '<pre>';
   		// print_r($projectsup);
   		// echo '</pre> ';
  


   		if(is_null($projectsup[0]['SUPERVISOR'])) //project is a graduation project
   		{
   			$rows=$con->prepare( "SELECT INSTRUCTOR.NAME ,TADR ,INSTRUCTOR.DESCRIPTION , LINKTOPROFILE FROM (PROJECT NATURAL JOIN TAUGHT_BY ) JOIN INSTRUCTOR ON IID = ID WHERE PROJECT.Name = ? AND TID = ?");
   			$rows->execute(array($pname,$tid));
   			$projectinst=$rows->fetchAll();
   	 //    echo '<pre>';
   		// print_r($projectinst);
   		// echo '</pre> ';
   		}
      else
      {
          $rows=$con->prepare( "SELECT INSTRUCTOR.NAME ,TADR ,INSTRUCTOR.DESCRIPTION , LINKTOPROFILE FROM INSTRUCTOR WHERE ID=?");
        $rows->execute(array($projectsup[0]['SUPERVISOR']));
        $projectinst=$rows->fetchAll();
      }
    

   		For($i=0; $i<count($projectinst); $i++)
   		{
   			if($projectinst[$i]['TADR']== 0) //ta 0 dr 1
   			{
   				$projectinst[$i]['NAME']="ENG ".$projectinst[$i]['NAME'];
   			}
   			else
   				$projectinst[$i]['NAME']="DR ".$projectinst[$i]['NAME'];
   		}

   		// echo '<pre>';
   		// print_r($projectinst);
     //  PRINT(count($projectinst));
   		// echo '</pre> ';

   	 	$rows = $con->prepare("SELECT DISTINCT ExpectedGradYear FROM (Student JOIN forms_team ON Susername=username) JOIN PROJECT ON forms_team.TID=PROJECT.TID WHERE Name = ? AND PROJECT.TID = ?");
       $rows->execute(array($pname,$tid));
       $class=$rows->fetchAll();
     	// echo '<pre>';
  	  	// print_r($class);
   	 	// echo '</pre> ';


       $rows = $con->prepare("SELECT Name,ID FROM TEAM  WHERE ID = ?");
       $rows->execute(array($tid));
       $projectteam=$rows->fetchAll();

       $rows = $con->prepare("SELECT COURSE.Name, Code FROM COURSE JOIN PROJECT ON CCODE=CODE  WHERE PROJECT.Name = ? AND PROJECT.TID = ?");
       $rows->execute(array($pname,$tid));
       $projectcourse=$rows->fetchAll();
     }

   	 	return view('projectProfile',compact('projectdata','class','projecttools','projectphotos','projectinst','projectteam','projectcourse'));
     }

     public function addproject($username)
     {
      // echo $username;

        $con = DB::connection()->getPdo();

        $studentcourses=array();
        $studentteams=array();
        $studentmates=array();
        $studentsupervisors=array();


       $rows = $con->prepare("SELECT ID,NAME FROM INSTRUCTOR WHERE TADR=1");
       $rows->execute(array());
       $studentsupervisors=$rows->fetchAll();

        $rows = $con->prepare("SELECT Ccode,PROJECT_REQUIREMENT.Name,YEAR FROM PROJECT_REQUIREMENT  JOIN STUDENT ON YEAR=EXPECTEDGRADYEAR WHERE username=? and Ccode not in( SELECT Ccode from FORMS_TEAM NATURAL JOIN PROJECT WHERE Susername=? AND YEAR=EXPECTEDGRADYEAR )");
       $rows->execute(array($username,$username));
       $studentcourses=$rows->fetchAll();

       //Decide if Graduation Project
       // $grad=0;
       // for($i=0; $i<count($studentcourses);$i++)
       // {
       //  if($studentcourses[$i]['Name']=='Graduation Project')
       //      $grad=1;
       // }
  // echo '<pre>';
        // print_r($projectcourses);
      // echo '</pre> ';


        $rows = $con->prepare("SELECT Name,ID FROM TEAM JOIN FORMS_TEAM ON TID=ID WHERE Susername = ?");
       $rows->execute(array($username));
       $studentteam=$rows->fetchAll();

        $rows = $con->prepare("SELECT * FROM STUDENT  WHERE USERNAME != ? AND EXPECTEDGRADYEAR =(SELECT EXPECTEDGRADYEAR FROM STUDENT WHERE username=?) ");
       $rows->execute(array($username,$username));
       $studentmates=$rows->fetchAll();

       return view('projectsub',compact('studentcourses','studentteam','studentmates','username','grad', 'studentsupervisors'));


     }



     public function createteam(Request $request,$username)
     {
      //do the check for prev teams later
        $con = DB::connection()->getPdo();

        $stmt = $con->prepare("INSERT INTO `team`(`Name`, `NoOfMembers`) VALUES (?,?)");
          $stmt->execute(array($request->teamname,count($request->teammemebers)+1));
         // $stmt->fetchAll();

          $lastid=$con->LastInsertId();
          //echo $lastid;

      //     echo '<pre>';
      //   print_r($stmt->insert_id;);
      // echo '</pre> ';

      for($i=0; $i<count($request->teammemebers); $i++)
      {
        $stmt = $con->prepare("INSERT INTO `forms_team`(`Susername`, `TID`) VALUES (?,?)");
          $stmt->execute(array($request->teammemebers[$i],$lastid));
      }
      //insert current user
       $stmt = $con->prepare("INSERT INTO `forms_team`(`Susername`, `TID`) VALUES (?,?)");
        $stmt->execute(array($username,$lastid));

        return $this->addproject($username);





    
      // echo '<pre>';
      // print_r($request->teammemebers);
      // print(count($request->teammemebers));
      // echo '</pre> ';


     }

    public function submitproj(Request $request, $username)
    {
       $con = DB::connection()->getPdo();
       if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->ProjectName))
       {
          echo'<script language="javascript">';
          echo'alert("[\'^£$%&*()}{@#~?><>,|=_+¬-] are invalid characters for project name")';
          echo '</script>';
          return $this->addproject($username);

       }
      //Check that this user wasn't involved with a projct with the same name before
      $userproject=array();
      //somequery to retrieve teamid and project names i'm sure ahmed has
       $rows = $con->prepare("SELECT Name,TID FROM PROJECT NATURAL JOIN forms_team WHERE Susername = ?");
       $rows->execute(array($username));
       $userproject=$rows->fetchAll();

      for($i=0; $i<count($userproject); $i++)
      {
        if(strcasecmp($request->ProjectName,$userproject[$i]['Name']) == 0 && ($request->team_combo==$userproject[$i]['TID']))
        {
           echo'<script language="javascript">';
          echo'alert("You have created a project with the same name with the same team before. Change name or team")';
          echo '</script>';
          return $this->addproject($username) ;
        }
     }

      if (is_null($request->team_combo))
       {
          echo'<script language="javascript">';
          echo'alert("Please Choose/Create a team")';
          echo '</script>';
         return $this->addproject($username);
       }

        if (is_null($request->req_combo))
       {
          echo'<script language="javascript">';
          echo'alert("No Project REQUIREMENT")';
          echo '</script>';
          return $this->addproject($username);
       }

        $rows = $con->prepare("SELECT EXPECTEDGRADYEAR FROM STUDENT  WHERE username = ?");
       $rows->execute(array($username));
       $class=$rows->fetchAll();


       // $stmt = $con->prepare("INSERT INTO `project`(`Name`, `TID`,`Supervisor`,`Year`,`Ccode`,`Demo`,`VideoLink`,`Document`,`Logo`,`Description`) VALUES (?,?,null,?,?,null,?,?,?,?)");
       // $stmt->execute(array($request->ProjectName,$request->team_combo,$class[0]['EXPECTEDGRADYEAR'],$request->req_combo,$request->ProjectDemo,$request->ProjectDocument,$request->logo,$request->ProjectDescription));
       $tags=explode('-', $request->Projecttags, -1);
       print_r();

        // return view('WaitAdmin');

       //Insert into project



        
    }

     }


     

// echo'<script language="javascript">';
// echo'alert("message")';
// echo '</script>';


