@extends('include.navbar')

@section('title')
    Create Project Requirement
@endsection

<?php 
    $cssfile = array();
    $jsfile = array();
?>

@section('content')
    <style>
        section{
            margin-top:150px;
            text-align: center;
        }
        form{
            margin: auto;
        }
        form input{
            margin: 20px auto;
            display: block;
            padding: 10px;
            border-radius: 5px;
            border: 1.5px solid green;
            /* max-width: 50%; */
            text-align: center;
            width: 30%;
        }
        form a{
            display: block;
            margin: 10px auto;
            display: block;
            width: 30%;
        }
        form a:link, a:visited {
            background-color: #fff;
            color: green;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            border: 2px solid green;
            border-radius: 5px;
        }

        form a:hover, a:active {
            background-color: green;
            color: white;
        }
        select{
            display: block;
            padding: 10px;
            margin: 10px auto;
            border: 1.5px solid green;
            border-radius: 5px;
            width: 30%;
        }
        option{
            text-align: center;
        }
        form button{
            background-color: white;
            border: 2px solid green;
            border-radius: 5px;
            padding: 10px;
            width: 30%;
            margin: 10px auto;
            color: green;
        }
        form button:hover{
            background-color: green;
            color: white;
        }
    </style>
    <section>
        <form action="/newRequirement" method="post">
            {{ csrf_field() }}
            <input type="text" name="req_name" minlength="5" maxlength="255" placeholder="requirement name" required>
            <input type="number" name="req_year" maxlength="4" min="1993" max="2018" placeholder="requirement year" required>
            <input type="text" name="req_descreption" maxlength="255" placeholder="requirement descreption" required>
            @if(isset($adminCourses))
                <select id="ccode" name="ccode" required>
                    <option value="">Select course</option>
                    @foreach($adminCourses as $course)
                        <option value={{$course[0]}}>{{$course[0]}}</option>
                    @endforeach
                </select>
            @endif
            <a href="">create new course</a>
            <button type="submit">Create Requirement</button>
        </form>
    </section>
@endsection