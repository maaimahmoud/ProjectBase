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
						<li><h4 class="walk-through-item">First Year</h4></li>
						<li><h4 class="walk-through-item">Second Year</h4></li>
						<li><h4 class="walk-through-item">Third Year</h4></li>
						<li><h4 class="walk-through-item">Fourth Year</h4></li>
					</ul>
					<ul class="Course-List">
						@if(isset($courses))
							@foreach($courses as $course)
								<li><h4><?php echo $course[0]; ?></h4></li>
							@endforeach
						@endif
					</ul>
					<ul class="TermList">
						<li><h4 class="walk-through-item">First Term</h4></li>
						<li><h4 class="walk-through-item">Second Term</h4></li>
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