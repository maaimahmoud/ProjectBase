@extends('include.navbar')

@section('title')
    ProjectBase
@endsection

@section('cssfile')
    {{$cssfile = "" /*type your css file path between the double quotes note: all path are with respect to public folder (consider public folder as your root directory)*/}}
@endsection

@section('jsfile')
    {{$jsfile = "" /*type your js file path between the double quotes note: all path are with respect to public folder (consider public folder as your root directory)*/}}
@endsection

@section('content')
 
<!DOCTYPE html>
<html>
<head>
<style> 
.explore-area{
        height: 610px;
}
.fixed-bg {
    background-image:url("images/Slogan.png");
    background-attachment: fixed;
    background-position:absolute;
    background-repeat: no-repeat;
    background-size: cover;
}

.walk-through{
    height:610px;
    background-color:#816447;
    background-color: rgba(81,64,47,0.9);
}
.walk-through ul{
    color: white;
    font-family:Josefin-sans;
    font-size: 45px;
    padding-top: 100px;
    /*padding-left: 100px;*/
    list-style: none;
}

.explore-button{
    margin-top: 465px;
    margin-left: 47%;
}
.explore-area p{
    color: white;  
    margin-left :43%;
}

.mai{
    position:absolute;
}

.btn:hover{
    background-image:none;
    background-color:#fcfd7b;
    cursor: pointer;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    
$(document).ready(function(){
        $("li").mouseenter(function(){
        $(this).css('text-decoration','underline');
        $(this).css('cursor','pointer');
        ///$("#walk-through-section").animate({left: '250px'});
        //$(".walk-through").hide('slide', {direction: 'left'}, 1000);
        /*$(".mai").animate({
            right: '750px',
            opacity: '0.5',
        });*/
            $(".mai").animate({"left": "-=500px"},"slow");
    });
        $("li").mouseleave(function(){
        $(this).css('text-decoration','none');
    });

        $("#explore").on("click", function() {
        var object = $(this);
        $("html ,body").animate({
            scrollTop: $("#" + object.data("scroll") + "-section").offset().top - 55}, 700);
    });



});

</script>
</head>

<body>
 
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

</body>
</html>

    
@endsection