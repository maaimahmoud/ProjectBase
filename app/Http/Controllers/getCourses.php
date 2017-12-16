<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class getCourses extends Controller
{

        function getCourses(){

        $con = DB::connection()->getPdo();
		$stmt = $con->prepare("SELECT Name FROM COURSE WHERE DeptCode = ?");
		$stmt->execute(array('CMP'));
		$row = $stmt->fetchAll();
		$count = $stmt->rowCount();


		$courses = array();

		if (isset($row)){
		    $courses = $row;
		}

		return view('index', compact('courses'));
	}
}