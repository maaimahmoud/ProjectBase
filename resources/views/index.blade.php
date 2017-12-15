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
            <div class="mai">
                <ul id="walk-through-list">
                    <li>First Year</li>
                    <li>Second Year</li>
                    <li>Third Year</li>
                    <li>Fourth Year</li>
                </ul> 
            </div>
        </div>
    </div>
@endsection