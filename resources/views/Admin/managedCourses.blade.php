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
    @if(isset($coursesList))
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
          @foreach($coursesList as $course)
            <tr>
              <?php $i++; ?>
              <td>{{$course[0]}}</td>
              <td>{{$course[1]}}</td>
              <td>{{$course[2]}}</td>
              <td>{{$course[5]}}</td>
              <td>{{$course[6]}}</td>
              <td>{{$course[7]}}</td>
              <td>{{$course[8]}}</td>
              <form method="post" action="Admin/projectApproved/{{$course[1]}}/{{$course[0]}}">
                {{ csrf_field() }}
                <input type="hidden" name="Project">
              <td> <button @if(($course[9])) disabled="true" @endif >Approve</button> </td>
              </form>
              
            </tr>
          @endforeach        
      </tbody>
  </table>
   @endif
</div>



@endsection