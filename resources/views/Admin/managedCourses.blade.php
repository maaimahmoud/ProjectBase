@extends('include.navbar')

@section('title')
    ProjectBase
@endsection

@section('content')
<?php  ?>
<div class="container">
     <div class="dropdown" class="nav-link" >
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > Choose Course </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if(isset($coursesManagedByAdmin))
                  @foreach($coursesManagedByAdmin as $course)
                      <form class="dropdown-item" method="post" action="/listOfProjects">
                        {{ csrf_field() }}
                        <input type="hidden" value={{$course[0]}} name="course">
                        <button style="border: none; background-color: transparent;" type="submit"><?php echo $course[1]; ?></button>
                      </form>
                  @endforeach
                @endif          
          </div>
     </div>
</div>


<div class="container">            
  <table class="table table-hover">
    @if(isset($projectList))
    <thead>
      <tr>
        <th>Project Name</th>
        <th>Team Number</th>
        <th>Supervisor</th>
        <th>Demo</th>
        <th>Video Link</th>
        <th>Document</th>
        <th>Logo</th>
        <th>Approved</th>
      </tr>
    </thead>
      <tbody>
        <?php $i=0; ?>
          @foreach($projectList as $project)
            <tr>
              <?php $i++; ?>
              <td>{{$project[0]}}</td>
              <td>{{$project[1]}}</td>
              <td>{{$project[2]}}</td>
              <td>{{$project[5]}}</td>
              <td>{{$project[6]}}</td>
              <td>{{$project[7]}}</td>
              <td>{{$project[8]}}</td>
              <form method="post" action="/projectApproved">
                {{ csrf_field() }}
                <input type="hidden" value={{$project[1]}} name="teamID">
                <input type="hidden"  value={{$project[0]}} name="projectName">
              <td> <button type="submit" @if(!($project[9])) disabled="true" @endif >Approve</button> </td>
              </form>
            </tr>
          @endforeach        
      </tbody>
  </table>
   @endif
</div>



@endsection