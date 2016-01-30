<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feel Me Out | Register</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('css/form-elements.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{URL::asset('ico/FMO.ico')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{URL::asset('ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="col-sm-6"><a href="URL::to('/')"><img class="img-responsive"src="{{URL::asset('img/FMO.png')}}" alt="FMO logo"></a></div>
                            <div class="col-sm-6 text" style="text-align:left;">
                                <h1><a href="URL::to('/')"><strong>Feel Me Out</strong></a><br/>Register</h1>
                                <h2><strong></strong></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <img class="img-responsive" src="{{URL::asset('img/uic-logo.png')}}">
                                        <p>Fill the following information: </p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <div class="row">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <form role="form" action="" method="post" class="registration-form">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label class="sr-only" for="id_number">ID Number</label>
                                            <input type="number" name="id_number" placeholder="ID Number..." class="id_number form-control" id="id_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="fname">First name</label>
                                            <input type="text" name="fname" placeholder="First name..." class="fname form-control" id="fname" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="lname">Last name</label>
                                            <input type="text" name="lname" placeholder="Last name..." class="lname form-control" id="lname" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="course">Course</label>
                                            <input type="text" name="course" placeholder="Course..." class="course form-control" id="course" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="radio"> Gender &nbsp;&nbsp;&nbsp;
                                                <label><input type="radio" name="gender" value="1" required></input>Male</label>&nbsp;&nbsp;&nbsp;
                                                <label><input type="radio" name="gender" value="2" required></input>Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="age">Age</label>
                                            <input type="number" name="age" placeholder="Age..." class="age form-control" id="age" required>
                                        </div>  
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email</label>
                                            <input type="text" name="email" placeholder="Email..." class="email form-control" id="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="password form-control" id="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password_comfimation">Password</label>
                                            <input type="password" name="password_confirmation" placeholder="Retype password" class="password_confirmation form-control" id="password_confirmation" required>
                                        </div>
                                        <button type="submit" class="btn">Sign me up!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h4>Already have an account? <a href="{{URL::to('auth/login')}}">Login</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="{{URL::asset('js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/jquery.backstretch.min.js')}}"></script>
        <script src="{{URL::asset('js/scripts.js')}}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>