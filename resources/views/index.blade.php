@extends('include.navbar')

@section('title')
    ProjectBase
@endsection

<?php 
    $cssfile = array("css/index.css");
    $jsfile = array("js/modernizr.custom.63321.js", "js/jquery.catslider.js", "js/index.js");
?>

@section('content')

<div class="fixed-bg">

    <div class="explore-area">  
    	<button id="explore" type="button" class="explore-button btn btn-default btn-lg" data-scroll="walk-through">EXPLORE</button>
        <p>If you have an account You can<br> <a href="#">Sign in</a> or <a href="#">Create a new account</a></p>
    </div>

    <div class="walk-through" id="walk-through-section">

	    <div class="container">	
			<div class="main">
				<div id="mi-slider" class="mi-slider">
					<ul class="Year-List">
						<li><a href="#"><h4>First Year</h4></a></li>
						<li><a href="#"><h4>Second Year</h4></a></li>
						<li><a href="#"><h4>Third Year</h4></a></li>
						<li><a href="#"><h4>Fourth Year</h4></a></li>
					</ul>
					<ul class="Course-List">
						<li><a href="#"><h4>OOP</h4></a></li>
						<li><a href="#"><h4>Graphics</h4></a></li>
						<li><a href="#"><h4>Datastructure</h4></a></li>
						<li><a href="#"><h4>Antenna</h4></a></li>
						<li><a href="#"><h4>Database</h4></a></li>
						<li><a href="#"><h4>Power</h4></a></li>
					</ul>
					<ul class="TermList">
						<li><a href="#"><h4>First Term</h4></a></li>
						<li><a href="#"><h4>Second Term</h4></a></li>
					</ul>
					<nav>
						<a href="#" id="Year-Button">Year</a>
						<a href="#" id="Course-Button">Course</a>
						<a href="#" id="Term-Button">Term</a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection