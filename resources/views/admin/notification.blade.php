@extends('include.navbar')

@section('title')
    Notification
@endsection

<?php 
    $cssfile = array();
    $jsfile = array();
?>

@section('content')
    <style>
        section a{
            display: block;
            margin-top: 50px;
            width: 30%;
        }
        section a:link, a:visited {
            background-color: #fff;
            color: green;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border: 2px solid green
        }
        section a:hover, a:active {
            background-color: green;
            color: white;
        }
        .empty{
            height: 200px;
        }
    </style>
    <section>
        <div class="container-fluid" style="text-align: center; height: 600px; background-color: #999;">
            <div class="empty"></div>
            <h1>{{$note[0]}}</h1>
            <a href={{$note[2]}}>{{$note[1]}}</a>
        </div>
    </section>
@endsection