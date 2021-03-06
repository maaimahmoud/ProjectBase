<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href= "{{ asset('css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href= "{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
    @if(isset($cssfile))
        @foreach($cssfile as $css)
            @if($css !== "")
                <link rel="stylesheet" href={{asset($css)}} />
            @endif
        @endforeach
    @endif
    
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #85e0e1">
        <div class="container">

            <div class="collapse navbar-collapse">
                <form action="/search" method="POST" class="form-inline mr-auto">
                {{ csrf_field() }}
                    <input class="form-control mr-sm-2" name="search_value" type="search" placeholder="Search" aria-label="Search" required>
                    <select style="width: 70px; margin-right: 10px;" class="custom-select form-control" id="search_combo" name="search_combo" required>
                        <option value="">Select your search method</option>
                        <option value="proname">Project Name</option>
                        <option value="tname">Team Name</option>
                        <option value="year">Year</option>
                        <option value="cname">Course Name</option>
                        <option value="ccode">Course Code</option>
                        <option value="dname">Department Name</option>
                        <option value="dcode">Department Code</option>
                    </select>
                    <button class="btn search_btn my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" width="180" height="40"alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a  href="/" class="nav-link">HOME</a>
                    </li>
                    
                    @if(Session::has('username'))
                   
                        <div class="dropdown" class="nav-link" >
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            Hi {{Session::get('firstName')}}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/user/{{Session::get('username')}}">View Profile</a>
                            @if(Session::has('isAdmin'))
                                @if(Session::has('isTA'))
                                    <a class="dropdown-item" href="/createProjectRequirment">Add Requirement</a>
                                    <a class="dropdown-item" href="/createCourse">Add Course</a>
                                    <a class="dropdown-item" href="/createAdmin">Add Admin</a>
                                @endif
                                <a class="dropdown-item" href="/managedCourses">View Managed Courses</a>
                            @else
                                <a class="dropdown-item" href="/{{Session::get('username')}}/addproject">Submit Project</a>
                            @endif
                            <a class="dropdown-item" href="/signOut">Log Out</a>
                          </div>
                    </div>
                      @else
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#login">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#signup">SIGNUP</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form class="log_form" action="/signIn" method="post">
                    <h2>LOG IN</h2>
                    <input id="login_username" placeholder="USER NAME" name="login_username" type="text">
                    <input id="login_password" placeholder="PASSWORD" name="login_password" type="password">
                    <button type="submit" class="submit">LOGIN</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <form class="log_form" action="/signUp" method="post">
                    <h2>SIGN UP</h2>
                    <input id="signup_username" placeholder="USER NAME" name="signup_username" type="text">
                    <input id="signup_firstname" placeholder="FIRST NAME" name="signup_firstname" type="text">
                    <input id="signup_middlename" placeholder="MIDDLE NAME" name="signup_middlename" type="text">
                    <input id="signup_lastname" placeholder="LAST NAME" name="signup_lastname" type="text">
                    <input id="signup_email" placeholder="EMAIL" name="signup_email" type="email">
                    <input id="signup_password" placeholder="PASSWORD" name="signup_password" type="password">
                    <input id="signup_password_confirm" placeholder="CONFIRM PASSWORD" name="signup_password_confirm" type="password">
                    <input id="expected_year" placeholder="GRADUATION YEAR" name="signup_egy" type="number" maxlength="4" min="1993" max="2021">
                    <button type="submit" class="submit">SIGNUP</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    @yield('content')

    <footer class="text-center">
        <div class="copy-rights">&copy; 2017 Project Base</div>
        <div class="social">
            <a href="#" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js') }}" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    @if(isset($jsfile))
        @foreach($jsfile as $js)
            @if($js !== "")
                <script src={{asset($js)}}></script>
            @endif
        @endforeach
    @endif
</body>

</html>