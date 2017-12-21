@extends('include.navbar')

@section('title')
    Create Course
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
        select{
            padding: 10px;
            margin: 10px auto;
            border: 1.5px solid green;
            border-radius: 5px;
            width: 30%;
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
        <form action="/newCourse" method="post">
            {{ csrf_field() }}
            @if(isset($Departments))
                <select id="deptcode" name="dept_code">
                    <option value="">Select Department</option>
                    @foreach($Departments as $Department)
                        <option value={{$Department[0]}}>{{$Department[0]}}</option>
                    @endforeach
                </select>
            @endif
            <input type="number" name="code" maxlength="3" placeholder="course code" required>
            <input type="text" name="name" minlengh="5" maxlength="255" maxlength="255" placeholder="course name" required>
            <input type="text" name="req_descreption" maxlength="255" placeholder="course descreption" required>
            <button type="submit">Create Course</button>
        </form>
    </section>
@endsection