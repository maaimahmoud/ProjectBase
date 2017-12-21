@extends('include.navbar')

<?php
	$cssfile = array("css/project/project_sub.css");
	$jsfile = array("js/ProjSub.js");
?>


@section('title')
	Search
@endsection

@section('content')

<form id="SubForm" action="/{{$username}}/submit" method="POST">
	{{ csrf_field() }}
  <h1>CREATE PROJECT</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    	<div class="card mr-auto ml-auto uploadcard" style="width: 20rem; ">
		<div class="card-body" >
				<h4 class="card-title">CHOOSE REQUIREMENT</h4> 
			
			<div class="list-group" style="margin:10px;">
			  <select required class="btn btn-secondary custom-select form-control " id="req_combo" name="req_combo">
			  	@for($i=0;$i<count($studentcourses);$i++)
                        <option value={{$studentcourses[$i]['Ccode']}}>{{$studentcourses[$i]['Name']}}</option>
                        @endfor
               </select>
	       </div>
				<h4 class="card-title">TEAM</h4> 
				<h5>Choose an existing team</h5>
				<div class="list-group" style="margin:10px;">
			  <select required class="btn btn-secondary custom-select form-control " id="team_combo" name="team_combo">
                   @for($i=0;$i<count($studentteam);$i++)
                        <option value={{$studentteam[$i]['ID']}}>{{$studentteam[$i]['Name']}}</option>
                        @endfor
               </select>
	       </div>	
			    <h5>Or</h5>
			    <p><button type="button" class="btn btn-secondary" onclick="GotoCreateTeam()">CREATE NEW TEAM</button> </p>
				<div style="overflow:auto;">
					<div style="float:right;">
						 <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-secondary">Previous</button>
						 <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-success">Next</button>	     	
					</div>
				</div>
			
	       </div>

		</div>
  </div>
  <div class="tab">
  	<div class="card mr-auto ml-auto uploadcard" style="width: 40rem; ">
			<div class="card-body" >
				<h4 class="card-title">PROJECT INFO</h4> 
				<h5>Project Name</h5>
				<h6>(Required)</h6>
			    <p><input placeholder="Awesome name..."  name="ProjectName" id="ProjectName" class="form-control" required></p>
			    <h5>Project Description</h5>
			    <h6>(Required)</h6>
    			<textarea placeholder="Awesome stuff about your project..." name="ProjectDescription" id="ProjectDescription" rows="7" class="form-control" required ></textarea>
    			{{-- @if($grad==1) --}}
    		{{-- 	<h5>Supervisor</h5>
			    <h6>(Required IF graduation project)</h6>
				<div class="list-group" style="margin:10px;">
					<select class="btn btn-secondary custom-select form-control " id="sup_combo" name="sup_combo">
						@for($i=0;$i<count($studentsupervisors);$i++)
					        <option value={{$studentsupervisors[$i]['ID']}}>{{$studentsupervisors[$i]['NAME']}}</option>
					        @endfor
					</select>
				</div> --}}
			    {{-- @endif --}}
				<h5>Projet Tags</h5>
    			<h6>(Optional)</h6>
    			<textarea placeholder="This will help people ind your project. Write the tags followed  by - . " name="Projecttags" id="Projecttags" rows="2" class="form-control invalid" ></textarea> 
    			<h5>Project Video Demo</h5>
    			<h6>(Optional)</h6>
			    <p><input placeholder="Paste Video Link here"  name="ProjectDemo" id="ProjectDemo" class="form-control ></p>
			    <h5>Project Documentation</h5>
    			<h6>(Optional)</h6>
			    <p><input placeholder="Paste document Link here"  name="ProjectDocument" id="ProjectDocument" class="form-control" ></p>
    			<h5>Project Images</h5>
    			<h6>(Optional)</h6>
				   <input type="file" value="Select images:" name="imgs" multiple>
			   <h5>Project Logo</h5>
    			<h6>(Optional)</h6>
				   <input type="file" value="Select Logo:" name="logo">
			</div>
			
	  	   <div style="overflow:auto;">
	    		<div style="float:right;">
		      	 	<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-secondary">Previous</button>
      				<button type="submit" id="nextBtn" {{-- onclick="nextPrev(1)" --}} class="btn btn-success">Submit</button>     	
		     	 </div>
	       </div>

		</div>

  </div>
</form>
  <form id="teamForm" action="/{{$username}}/createteam" method="POST">
  	{{ csrf_field() }}
  <div class="tab">
  		<div class="card mr-auto ml-auto uploadcard" style="width: 40rem; ">
			<div class="card-body" >
				<h4 class="card-title">Create Team </h4> 
				<h5>Team Name</h5>
    			<h6>(Required)</h6>
			    <p><input placeholder="Choose Something cool"  name="teamname" id="teamname" class="form-control" required></p>
			    <h5>Select team memebers</h5>
    			<h6>(Optional)-Could be solo</h6>
			  	<div class="vertical-menu">
			  		<div >
			  		@for($i=0;$i<count($studentmates);$i++)
			  		<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" id="teammates" name="teammates">
					<input type="checkbox" class="custom-control-input" name="teammemebers[]" value={{$studentmates[$i]['username']}}>
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description">{{$studentmates[$i]['FirstName']}}  {{$studentmates[$i]['LastName']}}</span>
					</label>	
					@endfor
			  		</div>
					
				</div>
			</div>
	  	   <div style="overflow:auto;">
	    		<div style="float:right;">
		      	 <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-secondary">Previous</button>
	      		 <button type="submit" id="nextBtn" {{-- onclick="nextPrev(1)" --}} class="btn btn-success " >Create</button>	     	
		     	 </div>
	       </div>

		</div>

  </div>
	<div class="tab">
		<div class="jumbotron">
		<h1 class="display-3">Project Submitted! Waiting for Admin's approval.</h1>
		<hr class="my-4">
		</div>
	</div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>




@endsection