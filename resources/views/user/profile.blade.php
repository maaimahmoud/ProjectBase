@extends('include.navbar')

@section('title')
    <?php echo (count($userInfo)>0?$username:'User Not Found') ?>
@endsection

@section('content')

    @if(count($userInfo)>0)
        @foreach($userInfo as $info)
        First Name: {{$info->FirstName}} <br>
        Middle Name: {{$info->MiddleName}} <br>
        Last Name: {{$info->LastName}} <br>
        Expected Graduation Year: {{$info->ExpectedGradYear}} <br>
        @endforeach

        @foreach ($projectsList as $project)
        <?php print_r($project) ?>
        <br>
        @endforeach
    @else
        <p> User not found </p>
    @endif
@endsection