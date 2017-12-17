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

					<ul class="Term-List">
						<li><h4 class="walk-through-item">First Term</h4></li>
						<li><h4 class="walk-through-item">Second Term</h4></li>
					</ul>

					<ul class="Course-List"	id="Course-List">
						
					</ul>


					<nav>
						<a href="#" id="Year-Button">Year</a>
						<a href="#" id="Term-Button">Term</a>
						<a href="#" id="Course-Button">Course</a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="Mai">
			<div id ="11">
				@if(isset($coursesYear1Term1))
					@foreach($coursesYear1Term1 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id="12">
				@if(isset($coursesYear1Term2))
					@foreach($coursesYear1Term2 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id ="21">
				@if(isset($coursesYear2Term1))
					@foreach($coursesYear2Term1 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id="22">
				@if(isset($coursesYear2Term2))
					@foreach($coursesYear2Term2 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id ="31">
				@if(isset($coursesYear3Term1))
					@foreach($coursesYear3Term1 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id="32">
				@if(isset($coursesYear3Term2))
					@foreach($coursesYear3Term2 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id ="41">
				@if(isset($coursesYear4Term1))
					@foreach($coursesYear4Term1 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
			<div id="42">
				@if(isset($coursesYear4Term2))
					@foreach($coursesYear4Term2 as $course)
						<li><h4><?php echo $course[0]; ?></h4></li>
					@endforeach
				@endif
			</div>
</div>

@endsection