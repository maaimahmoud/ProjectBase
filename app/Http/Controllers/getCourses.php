<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class getCourses extends Controller
{

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

		return view('index', compact('coursesYear1Term1','coursesYear1Term2','coursesYear2Term1','coursesYear2Term2','coursesYear3Term1','coursesYear3Term2','coursesYear4Term1','coursesYear4Term2'));
	}
}