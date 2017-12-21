@extends('include.navbar')

<?php $_SESSION = session()->all(); ?>

<?php
	$cssfile = array("css/project/project_sub.css");
	$jsfile = array("js/ProjSub.js");
?>


@section('title')
	Wait Admin
@endsection

@section('content')

	<div class="jumbotron">
		<h1 class="display-3">Project is waiting for an Admin's approval. :) </h1>
		<hr class="my-4">
		</div>



@endsection