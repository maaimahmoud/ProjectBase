<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <!-- css files -->
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    @if(isset($cssfile))
        @foreach($cssfile as $css)
            @if($css !== "")
                <link rel="stylesheet" href={{$css}} />
            @endif
        @endforeach
    @endif
    
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #85e0e1">
        <div class="container">

            <div class="collapse navbar-collapse">
                <form action="" method="GET" class="form-inline mr-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn search_btn my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <a class="navbar-brand" href="#">
                <img src="images/logo.png" width="180" height="40"alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#login">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#signup">SIGNUP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- LogIn -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form class="log_form" action="#" method="post">
                    <h2>LOG IN</h2>
                    <input id="login_username" placeholder="USER NAME" name="login_username" type="text">
                    <input id="login_password" placeholder="PASSWORD" name="login_password" type="password">
                    <button type="submit" class="submit">LOGIN</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- SignUp -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <form class="log_form" action="#" method="post">
                    <h2>SIGN UP</h2>
                    <input id="signup_username" placeholder="USER NAME" name="signup_username" type="text">
                    <input id="signup_email" placeholder="EMAIL" name="signup_email" type="text">
                    <input id="signup_password" placeholder="PASSWORD" name="signup_password" type="password">
                    <input id="signup_password_confirm" placeholder="CONFIRM PASSWORD" name="signup_password_confirm" type="password">
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

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- js files -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    @if(isset($jsfile))
        @foreach($jsfile as $js)
            @if($js !== "")
                <script src={{$js}}></script>
            @endif
        @endforeach
    @endif
</body>

</html>