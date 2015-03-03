
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
<body style=" background-color:ghostwhite;">
    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container">
            
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"><i class="icon-bar"> </i></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <div class="row">
                
            <a class="navbar-btn navbar-left" href="#" ><h1>theMentorWeb</h1></a>
           <div class="navbar-collapse collapse navbar-main-collapse"> 
            <form class="navbar-form navbar-right" role="form" style="padding-top:25px;"
            action="login.php" method="POST">
            <div class="form-group">
            <input type="text" placeholder="Username" class="form-control" name="username">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" name="submitLogin" class="btn btn-info"><span class="glyphicon glyphicon-user"></span>
            Sign in</button>
            <span class="help-block"></span></span>
            <ul class="nav navbar-nav clearfix">
                    
                    <li><a href="#registerModal" data-toggle="modal" data-target="#registerModal"><Strong>Register</Strong></a></li>
                    <li><a href="http://www.google.com"><Strong>Need help?</Strong></a></li>
                    <li><a href="#"><Strong>About us</Strong></a></li>
                    </ul></span>
               
          </form>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="z-index:-1; margin-top:12%; background-color:GhostWhite">
        <div class="row">
            <div class="col-md-4"><img class="img-responsive" src="photos/sjsu6.png"></div>
            <div class="col-md-offset-4 col-md-4"><img class="img-responsive" src ="photos/sjsu8.jpg"></div>
             
        </div>
    </div>
    <?php include 'registerModal.php' ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    
</body>
</html>
