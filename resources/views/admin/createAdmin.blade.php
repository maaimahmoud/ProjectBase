@extends('include.navbar')

@section('title')
    Create Admin
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
        <form action="/newAdmin" method="post">
            {{ csrf_field() }}
            <input type="text" name="username" minlength="5" maxlength="50" placeholder="username" required>
            <input type="email" name="email" maxlength="255" placeholder="email" required>
            <select id="st_ta" name="st_ta" required>
                <option value="1">Teaching Assistant</option>
                <option value="0">Student</option>
            </select>
            <button type="submit">Create Admin</button>
        </form>
    </section>
@endsection