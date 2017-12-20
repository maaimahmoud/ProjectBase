@extends('include.navbar')

@section('title')
    <?php echo (count($teamMembers)>0?array_values($teamName)[0]->Name:'Team Not Found') ?>
@endsection

@section('content')

    @if(count($teamMembers)>0)
    <ol>
        @foreach($teamMembers as $member)
          <li><a href="/user/{{$member->Susername}}">{{$member->Susername}}</a></li>
        @endforeach
    <ol>
        @foreach ($projectsList as $project)
        <?php print_r($project) ?>
        <br>
        @endforeach
    @else
        <p> Team not found </p>
    @endif
@endsection