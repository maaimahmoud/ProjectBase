@extends('include.navbar')
<?php
	$cssfile = array("css/project/project_profile.css");
	$jsfile = array("");
?>
{{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/project/project_profile.css') }}" rel='stylesheet' type='text/css' /> --}}
{{-- <script src="{{ asset('js/jquery.min.js') }}"> </script> --}}

@section('title')
	project profile
@endsection


@section('content')
{{-- <div class="card-group"> --}}
	@if(count($projectdata)>0)
<div class="container-fluid " > 
	<div class=" row " {{-- style="padding: 0;" --}}>
		<div class="col-sm-3" style="margin-top: 30px;"  {{-- style="margin: 20px;" --}}  >
			<div class="maryam">
	
				<img class="card-img-top" width="100%" src="{{asset($projectdata[0]['Logo'])}}" alt="Card image cap"> 
			</div>
			<div class="card cardstat" >
				<div class="card-body">
					<h4 class="card-title projtitle">{{$projectdata[0]['Name']}} </h4>
					<p style="text-align:center;">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					</p>
					
					<hr class="my-4 ">
					<h6>CLASS <a href="#" class="badge badge-light">{{$class[0]['ExpectedGradYear']}}</a></h6>
				    <hr class="my-4">
					<h6>TEAM  <a href="#" class="badge badge-light">{{$projectteam[0]['Name']}}</a></h6>
					<hr class="my-4">
					<h6>COURSE <a href="#" class="badge badge-light">{{$projectcourse[0]['Name']}}</a></h6>
					<hr class="my-4">

					<h6>INSTRUCTORS<p>
							@for($i=0; $i<count($projectinst); $i++ )
						<a href={{$projectinst[$i]['LINKTOPROFILE']}} class="badge badge-danger">{{$projectinst[$i]['NAME']}} </a>
						@endfor
					</h6>
					<hr class="my-4">
					<h6>TECHNOLOGIES<p>
						@for($i=0; $i<count($projecttools); $i++ )
						<a href="#" class="badge badge-info">{{$projecttools[$i]['TOOLS']}} </a>
						@endfor
					</h6>
					<hr class="my-4">
					<a href={{$projectdata[0]['Document']}} class="badge badge-dark">Documentation</a>
				</div>
				
		
			</div>
		</div>

	{{-- <div style="display: inline-block; vertical-align:top; "> --}}
		<div class=" col-sm-9 " style="margin-top: 30px;">
			<div {{-- class="w-75 " --}} {{-- style="width: 93%" --}}>
				{{-- <div class="card cardstat"  --}}
					{{-- <div class="card-body nomar"> --}}
						<h4 class="card-title ">DESCRIPTION </h5>
						<hr class="my-4" >
						<p class="lead" style="background-color: white; padding: 10px; border-radius: 10px; font-size: 20px; ">{{$projectdata[0]['Description']}}</p>
					{{-- </div> --}}
				{{-- </div> --}}
				@if(count($projectphotos)>0 || isset($projectdata[0]['VideoLink']))
					<div id="carouselExampleIndicators" class="carousel slide slidestat" data-ride="carousel"  {{-- style="margin: 30px" --}}>
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							@for($i=1; $i<count($projectphotos)+isset($projectdata[0]['VideoLink']);$i++)
							<li data-target="#carouselExampleIndicators" data-slide-to={{$i}}></li>
							@endfor
						</ol>
						<div class="carousel-inner">
							@if(count($projectphotos)>0)
							<div class="carousel-item active">
								<img class="carouselstat" src={{asset($projectphotos[0]['PHOTOS'])}} alt="slide">
							</div>
							@endif
							@for($i=1; $i<count($projectphotos); $i++)
							<div class="carousel-item">
								<img class="carouselstat" src={{asset($projectphotos[$i]['PHOTOS'])}} alt="slide">
							</div>
							@endfor
							{{-- @if(isset($projectdata[0]['VideoLink'])) --}}
							<div class="carousel-item">
								<?php
								echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"95%\" height=\"100%\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$projectdata[0]['VideoLink']);?>
					    </div>
						    {{-- @endif --}}
						</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="width: 20px;">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="width: 20px;">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
					</div>	
				@endif
			</div>
			
		</div>
	</div>
  <hr class="my-4">





{{-- $(function(){
  $('#video').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });

  // If you want to keep full screen on window resize
  $(window).resize(function(){
    $('#video').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  });
}); --}}

</div>

@else
	<div class="jumbotron">
		<h1 class="display-3">No such Project. Sounds awesome though!</h1>
		<hr class="my-4">
		@endif
	</div>

{{-- </div> --}}

{{-- </div> --}}

@endsection