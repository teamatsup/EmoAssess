<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feel Me Out | Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo e(URL::asset('bootstrap/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('font-awesome/css/font-awesome.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(URL::asset('css/form-elements.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo e(URL::asset('ico/FMO.ico')); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::asset('ico/apple-touch-icon-144-precomposed.png')); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::asset('ico/apple-touch-icon-114-precomposed.png')); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::asset('ico/apple-touch-icon-72-precomposed.png')); ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::asset('ico/apple-touch-icon-57-precomposed.png')); ?>">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="col-sm-6"><a href="URL::to('/')"><img class="img-responsive"src="<?php echo e(URL::asset('img/FMO.png')); ?>" alt="FMO logo"></a></div>
                            <div class="col-sm-6 text" style="text-align:left;">
                                <h1><a href="URL::to('/')"><strong>Feel Me Out</strong></a><br/>Login</h1>
                                <h2><strong></strong></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                                    <img class="img-responsive" src="<?php echo e(URL::asset('img/uic-logo.png')); ?>">
                            		<p>Enter your ID and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <div class="row">
                                    <?php if(count($errors) > 0): ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <ul>
                                                <?php foreach($errors->all() as $error): ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
			                    <form role="form" action="/auth/login" method="post" class="login-form">
                                    <?php echo csrf_field(); ?>

			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-idnumber">ID Number</label>
			                        	<input type="text" name="id_number" placeholder="ID Number..." class="form-username form-control" id="id_number">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h4>Can't login? <a href="<?php echo e(URL::to('auth/register')); ?>">Register</a> or Contact administrator</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="<?php echo e(URL::asset('js/jquery-1.11.1.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/jquery.backstretch.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/scripts.js')); ?>"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>