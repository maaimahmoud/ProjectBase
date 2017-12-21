@extends('include.navbar')

@section('title')
    <?php echo (count($userInfo)>0?$username:'User Not Found') ?>
@endsection

@section('content')

    @if(count($userInfo)>0)
        @foreach($userInfo as $info)
        @if(Session::has('username'))
        @if($info->username === Session::get('username'))
        <a href="/editprofile">edit profile</a>
        @endif
        @endif
        <h1>{{$info->username}}'s Profile<br></h1>
        <h2>First Name: {{$info->FirstName}} </h2>
        <h2>Middle Name: {{$info->MiddleName}} </h2>
        <h2>Last Name: {{$info->LastName}} </h2>
        <h2>Expected Graduation Year: {{$info->ExpectedGradYear}} </h2>
        <br>
        @endforeach

        <h2>List of Projects</h2>
        @foreach ($projectsList as $project)

        <h2><a href="/projectProfile/{{$project->tid}}/{{$project->name}}">{{$project->name}}</a></h2>

        @endforeach
    @else
        <p> User not found </p>
    @endif
@endsection