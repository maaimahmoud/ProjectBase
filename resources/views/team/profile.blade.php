@extends('include.navbar')

<?php $_SESSION = session()->all(); ?>

@section('title')
    <?php echo ($teamName !== "NULL")?$teamName:'Team Not Found' ?>
@endsection

<?php 
    $cssfile = array();
    $jsfile = array();
?>

@section('content')

    @if(count($teamMembers)>0)
        <h1>{{$teamName}}'s Profile</h1>
        <br>

        <h2>Team Members:</h2>

        <ol>
        @foreach($teamMembers as $member)
        <li><h2><a href="/user/{{$member->Susername}}">{{$member->Susername}}</a></h2></li>
        @endforeach
        </ol>

        <h2>List of Projects</h2>
        @foreach ($projectsList as $project)
        <h2><a href="/projectProfile/{{$project->tid}}/{{$project->name}}">{{$project->name}}</a></h2>

        @endforeach
    @else
        <p> Team not found </p>
    @endif
@endsection