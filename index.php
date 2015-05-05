
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
    <link href="js/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet"></link>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>  
    <script type = "text/javascript" src="ajax.js"></script>
    <script type = "text/javascript">
    
        const CANVAS_X = 220;
        const CANVAS_Y = 120;
        const CANVAS_W =  920;
        const CANVAS_H = 500;
        const IMAGE_W  = 250;
        const IMAGE_H  = 250;
        
        const RIGHT    = CANVAS_W - 100;
        const BOTTOM   = CANVAS_H - 100;
        
        var x  = 30;
        var y  = 20;
        var dx = 30;
        var dy = 15;
        
        var cx11= 25;
        var cx12= 10;
        var cx13= 100;
        var cx14= 250;
        var cx15= 90;
        var cx16= 60;
        var cx17= 20;
        var cx18= 200;
        var cy17=200;
        
         var dcx1 = 3;
         var dcx2 = 2;
         var dcx3 = .8;
         var dcx4 = -.9;
         var dcx5 = .3;
         var dcx6 = .15;
         var dcx7 = .5;
         var dcy7 = .03;
         var dcx8 = -.04;
        
        var leftcon;
        var centercon1;
        var rightcon;
        
        var leftimage;
        var centerimage1;
        var centerimage2;
        var centerimage3;
        var centerimage4;
        var centerimage5;
        
        var rightimage;
        var angle = 0;
        
        function startAnimation()
        {
            
           /*
            leftcon = document.getElementById("leftcanvas").getContext("2d");
            leftimage = new Image();
            leftimage.src = "photos/sjsu8.jpg";
            setInterval(leftdraw, 500);
          
            centercon1 = document.getElementById("centercanvas1").getContext("2d");
            centerimage1 = new Image();
            centerimage2 = new Image();
            centerimage3 = new Image();
            centerimage4 = new Image();
            centerimage5 = new Image();
            centerimage6 = new Image();
            centerimage7 = new Image();
            centerimage8 = new Image();
            centerimage1.src = "photos/sun.png";
            centerimage2.src = "photos/cloud.png";
            centerimage3.src = "photos/cow.png";
            centerimage4.src = "photos/horse.png";
            centerimage5.src = "photos/donkey.png";
            centerimage6.src = "photos/duck.png";
            centerimage7.src = "photos/pig.png";
            centerimage8.src = "photos/sheep.png";
            setInterval(centerdraw, 350); 
           */
           
            rightcon = document.getElementById("rightcanvas").getContext("2d");
            rightimage = new Image();
            rightimage.src = "photos/sjsu6.png";
            setInterval(rightdraw, 500); 
               
            
            
        }
        
     /*   function leftdraw()
        {
            leftcon.strokeStyle = "black";
            leftcon.fillStyle = "#F8F8FF";
            leftcon.fillRect(0, 0, CANVAS_W, CANVAS_H);
            leftcon.strokeRect(0, 0, CANVAS_W, CANVAS_H);
            
            angle += 0.25;
            if (angle > 2* 3.14) angle = 0;
            
            leftcon.save();
            leftcon.translate(175, 175);
            leftcon.rotate(angle);
            leftcon.drawImage(leftimage, -IMAGE_W/2, -IMAGE_H/2, 
                                  IMAGE_W, IMAGE_H);
            leftcon.restore();
            $("#leftcanvas").fadeIn(1000);
            $("#leftcanvas").fadeOut("slow");
        }    
/*        
        function centerdraw()
        {
            centercon1.strokeStyle = "black";
            centercon1.fillStyle = "#66CCFF";
            centercon1.fillRect(0, 0, CANVAS_W, CANVAS_H);
            centercon1.strokeRect(0, 0, CANVAS_W, CANVAS_H);
            centercon1.drawImage(centerimage1,cx11,10,75,75);
            centercon1.drawImage(centerimage2,cx12,33,120,110);
            centercon1.drawImage(centerimage3,cx13,280,70,70);
            centercon1.drawImage(centerimage4,cx14,225,65,65);
            centercon1.drawImage(centerimage5,cx15,255,50,50);
            centercon1.drawImage(centerimage6,cx16,300,25,25);
            centercon1.drawImage(centerimage7,cx17,cy17,30,30);
            centercon1.drawImage(centerimage8,cx18,200,30,30);
        
            cx11 += dcx1;
            cx12 += dcx2;
            cx13 += dcx3;
            cx14 += dcx4;
            cx15 += dcx5;
            cx16 += dcx6;
            cx17 += dcx7;
           
            cx18 += dcx8;
            
            if (cx11 < 0)  cx11 = CANVAS_W;
            else if ( cx11 > CANVAS_W)  cx11 = 0;
            if (cx12 < 0)  cx12 = CANVAS_W;
            else if ( cx12 > CANVAS_W)  cx12 = 0;
            if (cx13 < 0)  cx13 = CANVAS_W;
            else if ( cx13 > CANVAS_W)  cx13 = 0;
            if (cx14 < 0)  cx14 = CANVAS_W;
            else if ( cx14 > CANVAS_W)  cx14 = 0;
            if (cx15 < 0)  cx15 = CANVAS_W;
            else if ( cx15 > CANVAS_W)  cx15 = 0;
            if (cx16 < 0)  cx16 = CANVAS_W;
            else if ( cx16 > CANVAS_W)  cx16 = 0;
            if (cx17 < 0)  cx17 = CANVAS_W;
            else if ( cx17 > CANVAS_W)  cx17 = 0;
           
            if (cx18 < 0)  cx18 = CANVAS_W;
            else if ( cx18 > CANVAS_W)  cx18 = 0;
           
        }
            
  */      
        
        
        function rightdraw()
        {
            rightcon.strokeStyle = "blue";
            rightcon.fillStyle = "#DCDCDC";
            rightcon.fillRect(0, 0, CANVAS_W, CANVAS_H);
            rightcon.strokeRect(0, 0, CANVAS_W, CANVAS_H);
            rightcon.drawImage(rightimage, x, y, 100, 100);
            
            x += dx;
            y += dy;
            
            // Bounce off a wall
            if ((x < 0) || (x > RIGHT))  dx = -dx;
            if ((y < 0) || (y > BOTTOM)) dy = -dy;

            $("#rightcanvas").fadeIn(3000);
            $("#rightcanvas").fadeOut("slow");
        }
        
        
    </script>
</head>
<body style="background-image: url('photos/connection.jpg');" onload="startAnimation()">
    
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
            <button type="submit" name="submitLogin" class="btn btn-large btn-primary"><span class="glyphicon glyphicon-user"></span>
            Sign in</button>
            <span class="help-block"></span></span>
            <ul class="nav navbar-nav clearfix">
                    
                    <li><a href="#registerModal" data-toggle="modal" data-target="#registerModal"><Strong>Register</Strong></a></li>
            </ul></span>
               
          </form>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="row" style="z-index:-1; margin-top:12%; background-color:#ffffff; border: 1px solid black;
    opacity: 0.2;">
        
        <!--
            <div class="col-md-4">
                <canvas id="leftcanvas"height = "500" width = "350">
                <p class="bg-danger">Canvas not supported</p>
                </canvas>
           
            </div>
            <div class="col-md-4">
                <canvas id="centercanvas1"height = "500" width = "350">
                <p class="bg-danger">Canvas not supported</p>
                </canvas>
            </div>
            -->
            
                <canvas id="rightcanvas" height = "800" width = "850" style="padding-left:100px;">
                <p class="bg-danger">Canvas not supported</p>
                </canvas>
           
       
   </div>
            </div>
        </div>
    </div>
<!--
	<form align="middle"action="">
        <button type="button" 
                onclick="doAJAX()">
            Click here for a welcome message
        </button>
    </form>
    <hr />
    <div id="output">
        <p align="middle">Click the button above for a special welcome message</p>
    </div>
-->
    <?php include 'registerModal.php' ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    
    
</body>

</html>

