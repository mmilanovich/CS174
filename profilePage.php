<?php
session_start();
$username = $_SESSION['username'];
include('session.php');
include('interestFunctions.php');
include('mentorMenteeFunctions.php');
include('bioModal.php');
try {
                $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                // Add a new interest & 
                // Add into user's list of interest
                $query = "SELECT bio from userdata where username = '$username'";
                $ps = $con->prepare($query);
                $ps->execute();
                $data = $ps->fetchALL(PDO::FETCH_ASSOC);
                //print_r ($data);
                } catch(PDOException $ex) {
    echo "<p>Connection failed</p> $ex";
  }
?>
<html>
<head>
	<title>User Profile Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <!-- Squad theme CSS -->
	    <link href="css/style.css" rel="stylesheet">
      <link href="css/registerThankYou.css" rel="stylesheet">
	    <link href="color/default.css" rel="stylesheet">
	    <script src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/profilePage.css">
  <script type="text/javascript" src="js/menu.js"></script>
  <script type="text/javascript">
      $(window).load(function(){
          if(document.referrer.substring(document.referrer.lastIndexOf("/")) == "/")
          {
            $('#thankYouModal').modal('show');
            setTimeout(function() { $('#thankYouModal').modal('hide'); }, 2000);
          }
          /*$("#editBio").on("click", function () {
            
            $("#bioDiv > p#bio").html('<form action="saveBio.php" method="POST"><textarea id="bioText" name="bioText" rows="10" cols="80">' +  $("#bioDiv >p#bio").html() +'</textarea><button type="submit "id="saveBio" name="saveBio" class="btn btn-success" type="button">Save Bio</button></form>');
            return false;
          });*/
      });

      
      
  </script>
</head>

<body style="background-image: url('photos/connection.jpg');">
<div class="row">
	<div class="col-lg-10 col-lg-offset-1 "><br>
		<a href="index.php" class="btn btn-primary btn-block">
   		 <span class="glyphicon glyphicon-arrow-left"></span> Logout </a>
 	 	 <button class="btn btn-primary btn-block"> <h1 style="color:white; text-align:center;"> theMentorWeb Dashboard</h1></button>
		 
		
			<br>
				<div class="col-md-4">
					 <div class="panel panel-primary">
			 			<div class="panel-heading"><h4>Find a mentor or mentee</h4></div>
						 <div class="panel-body">   
							 <form action="SearchForMatch.php" method="GET">
							 	<div class="input-group">  
	      							<input type="text" class="form-control" name="interest" placeholder="Search for an interest...">
	      							<span class="input-group-btn">
	        						<button type="submit" class="btn btn-success" type="button">Go!</button>
	      							</span>		  
	    						</div>
	    					 </form>
			 			</div>
					</div>
				</div>
				
				<div class="col-md-4">
					 <div class="panel panel-primary">
			 			<div class="panel-heading"><h4>Add an interest</h4></div>
						 <div class="panel-body">   
							 <form action="AddInterest.php" method="GET">
							 	<div class="input-group">  
	      							<input type="text" class="form-control" name="interest" placeholder="Name of an interest...">
	      							<span class="input-group-btn">
	        						<button type="submit" class="btn btn-success" type="button">Add it!</button>
	      							</span>		  
	   			   				</div>
	    					 </form>
			 			</div>
					</div>
				</div>
				
				
		<div class="col-md-4 ">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4> More Functions</h4></div> 
			<div class="panel-body"> 
				<div class="menuBar">
       				 <a href="menu1.html" class="menuLink" style="background:#5cb85c;">More<span class="caret"></span></a>
       				 <ul class="menu" id="menu1">
           				<li><a href="connection.php" class="btn btn-primary btn-block"> My Connections</a></li>
           				<li><a href="message.html"	class="btn btn-primary btn-block">Message A Contact </a></li>
           				<li><a href="removeInterest.html" class="btn btn-primary btn-block">Remove an Interest</a></li>
           					<?php
           						$mentorUsernameArray = getMentorUsername($username);
              					
								if ($mentorUsernameArray == null) {
               						printf("<li><a href='#' class='btn btn-block btn-primary'> No Mentor Connection!</a></li>");
								} else {
									for ($i = 0; $i < count($mentorUsernameArray); $i++) {
										printf("<li><a href='unmatchmentor.php' class='btn btn-block btn-primary'>Unmatch me with Mentor ".$mentorUsernameArray[$i]['mentor_user_id']."</a></li> ");
									}
                					
								}
            					
								$menteeUsernameArray = getMenteeUsername($username);
              					if ($menteeUsernameArray == null) {
                					printf("<li><a href='#'class='btn btn-block btn-primary'> No Mentee Connection!</a></li>");
              					} else {
									for ($i = 0; $i < count($menteeUsernameArray); $i++) {
               				    		printf("<li><a href='unmatchmentee.php' class='btn btn-block btn-primary'>Unmatch me with mentee ".$menteeUsernameArray[$i]['mentee_user_id']."</a></li> ");
									}
								}
            				?>
            			<li><a href='lookingForMatch.php'	class="btn btn-block btn-primary">Update Looking for match</a></li>
            			<li><a href='changeMentorStatus.php'	class="btn btn-block btn-primary">Toogle Mentor Status</a></li>
            			<li><a href='changeMenteeStatus.php'	class="btn btn-block btn-primary">Toogle Mentee Status</a></li>
       
					</ul>
        		</div>
			</div>   
		</div>
	</div>		
				
				
				
	<div class="col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading"> 
				<h2><?php printf("$firstName $lastName")?></h2>
				<h3 class="special">Biography</h3>
			</div> 
			<div id="bioDiv" class="panel-body"> 
        <a href="#bioModal" class="btn btn-lg btn-success" data-toggle="modal" data-target="#bioModal"><Strong>Edit Bio</Strong></a>
				<img src="http://newarkpatrioticfund.co.uk/wp-content/uploads/2014/05/profile-placeholder.jpg"></img>
        		<p id="bio" class="bg-info">
        		<?php $cu = $data[0];
            print_r($cu['bio']);?>
				</p>
			</div>    
		</div>
	</div>
		
        <?php
        if($mentor == 0)
          $mentorString = "";
        else
          $mentorString = "Mentor";

        if($mentee == 0)
          $menteeString = "";
        else
          $menteeString = "Mentee";

        if($lookingForMatch == 0)
          $lookingForMatchString = "No";
        else
          $lookingForMatchString = "Yes";
        ?>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading ">
        <h4>Your Info
            
          </h4>
      </div> 
			<div class="panel-body" id="below"> 

				<p class="bg-info"> Username : <?php echo $username; ?> </p>
        		<p class="bg-info"> I'm a : <?php printf("$mentorString,  $menteeString")?> </p>
        		<p class="bg-info"> Looking for a match : <?php echo $lookingForMatchString?></p>
       			<p class="bg-info"> My interests : 
       				 <?php 
         				 $data = myInterest($username);
						 $i = 0;
         				 foreach($data as $row)
          				{
           					 foreach($row as $name => $value)
            				{
								if ($i > 0) {
									printf(", ");
								}
              					$interestName = getInterestName($value);
             					 print " $interestName";
								 $i++;
            				}
          				}
       				 ?></p>

        		<p class="bg-info"> My mentors: 
        			<?php 
          				$mentorUsernameArray = getMentorUsername($username);
         				if($mentorUsernameArray == null) {
            				printf("There is no mentor connection!");
          				} else {
							for ($i = 0; $i < count($mentorUsernameArray); $i++) {
           			    		if ($i > 0) {
           			    			printf(", ");
           			    		}
								printf($mentorUsernameArray[$i]['mentor_user_id']); 
							}
						}

        		?> </p>

       			 <p class="bg-info"> My mentees : 
        			<?php
          				$menteeUsernameArray = getMenteeUsername($username);
         				if($menteeUsernameArray == null) {
          				  printf("There is no mentees connection!");
       					} else {
							for ($i = 0; $i < count($menteeUsernameArray); $i++) {
        			    		if ($i > 0) {
        			    			printf(", ");
        			    		}
							printf($menteeUsernameArray[$i]['mentee_user_id']); 
						}
					}
       				 ?> </p>
			</div>    
		</div>
	</div>
</div>
</div>
  <?php include 'registerThankYou.html' ;
  //echo "<p>" . $_SERVER['HTTP_REFERER'] . "</p>";
  ?>
  <?php include 'editProfileModal.php' ?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script> 
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/custom.js"></script>
  
</body>


</html>
