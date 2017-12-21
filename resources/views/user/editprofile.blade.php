@extends('include.navbar')

@section('title')
    Edit Profile
@endsection

@section('content')
    <h1>Update password</h1>
    <br>
    
    {{--  IN case of error message  --}}
    @if(isset($msg))
        {{$msg}}
    @endif

    {!! Form::open(['action' => ['UserController@setUserPassword']]) !!}
    <div class = "form-group">
    {{Form::label('title','New password')}}
    <br>
    {{Form::password('password')}}
    </div>
    <div class = "form-group">
    {{Form::label('title','Confirm password')}}
    <br>
    {{Form::password('confirmPassword')}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection