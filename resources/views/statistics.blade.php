@extends('include.navbar')

@section('title')
    Statistics
@endsection

@section('content')
    <h1>Website Statistics</h1>
    <br>
    <ul>
    <li><h2>Total Number of Users: {{$usersCount}} </h2></li>
    <li><h2>Total Number of Courses: {{$coursesCount}} </h2></li>
    <li><h2>Total Number of Projects: {{$projectsCount}} </h2></li>
    <li><h2>Best Team: <a href="/team/{{$bestTeamID}}">{{$bestTeamName}}</a> ({{$bestTeamCount}} projects)</li>
    <li><h2>Best User: <a href="/user/{{$bestUserUsername}}">{{$bestUserUsername}}</a>
     ({{$bestUserCount}} projects)</h2></li>
    </ul>
@endsection