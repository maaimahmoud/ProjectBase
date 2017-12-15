@extends('include.navbar')

@section('title')
    ProjectBase
@endsection

@section('cssfile')
    {{$cssfile = "css/style.css" /*type your css file path between the double quotes note: all path are with respect to public folder (consider public folder as your root directory)*/}}
@endsection

@section('jsfile')
    {{$jsfile = "js/modernizr.custom.63321.js" /*type your js file path between the double quotes note: all path are with respect to public folder (consider public folder as your root directory)*/}}
@endsection

@section('content')
	     		
		<div class="container">	
			<div class="main">
				<div id="mi-slider" class="mi-slider">
					<ul>
						<li><a href="#"><img src="images/1.jpg" alt="img01"><h4>Boots</h4></a></li>
						<li><a href="#"><img src="images/2.jpg" alt="img02"><h4>Oxfords</h4></a></li>
						<li><a href="#"><img src="images/3.jpg" alt="img03"><h4>Loafers</h4></a></li>
						<li><a href="#"><img src="images/4.jpg" alt="img04"><h4>Sneakers</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/5.jpg" alt="img05"><h4>Belts</h4></a></li>
						<li><a href="#"><img src="images/6.jpg" alt="img06"><h4>Hats &amp; Caps</h4></a></li>
						<li><a href="#"><img src="images/7.jpg" alt="img07"><h4>Sunglasses</h4></a></li>
						<li><a href="#"><img src="images/8.jpg" alt="img08"><h4>Scarves</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/9.jpg" alt="img09"><h4>Casual</h4></a></li>
						<li><a href="#"><img src="images/10.jpg" alt="img10"><h4>Luxury</h4></a></li>
						<li><a href="#"><img src="images/11.jpg" alt="img11"><h4>Sport</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/12.jpg" alt="img12"><h4>Carry-Ons</h4></a></li>
						<li><a href="#"><img src="images/13.jpg" alt="img13"><h4>Duffel Bags</h4></a></li>
						<li><a href="#"><img src="images/14.jpg" alt="img14"><h4>Laptop Bags</h4></a></li>
						<li><a href="#"><img src="images/15.jpg" alt="img15"><h4>Briefcases</h4></a></li>
					</ul>
					<nav>
						<a href="#">Shoes</a>
						<a href="#">Accessories</a>
						<a href="#">Watches</a>
						<a href="#">Bags</a>
					</nav>
				</div>
			</div>
		</div><!-- /container -->
		<script type="text/javascript" src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();
			});
		</script>  
@endsection