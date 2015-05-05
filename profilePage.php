<?php
include('session.php');
include('interestFunctions.php');
include('mentorMenteeFunctions.php');

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
           				<li><a href="message.html"	class="btn btn-primary btn-block">Message A Contact <a/></li>
           				<li><a href="removeInterest.html" class="btn btn-primary btn-block">Remove an Interest</a></li>
           					<?php
           						 $mentorUsername = getMentorUsername($username);
              						if($mentorUsername == null)
               					 printf("<li><a href='#' class='btn btn-block btn-primary'> No Mentor Connection!</li>");
             					 else
                				printf("<li><a href='unmatchmentor.php' class='btn btn-block btn-primary'>Unmatch me with Mentor $mentorUsername</li> ");

            					$menteeUsername = getMenteeUsername($username);
              					if($menteeUsername == null)
                				printf("<li><a href='#'class='btn btn-block btn-primary'> No Mentee Connection!</li>");
              					else
               				    printf("<li><a href='unmatchmentee.php' class='btn btn-block btn-primary'>Unmatch me with mentee $menteeUsername</li> ");
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
			<div class="panel-body"> 
				<img src="http://newarkpatrioticfund.co.uk/wp-content/uploads/2014/05/profile-placeholder.jpg"></img>
        		<p class="bg-info">
        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        		Aliquid cum quasi nulla molestias accusamus 
        		aspernatur reiciendis qui optio tenetur modi repellendus 
        		distinctio dolore nesciunt. Repellat provident explicabo 
       			 accusamus autem perspiciatis. Lorem ipsum dolor sit amet,
         		consectetur adipisicing elit. Esse architecto modi ratione 
         		porro magnam explicabo! Porro dolore aut nam sed officiis 
         		dolores unde quo nostrum vero earum error ipsum cumque? 
         		Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
         		Facere aliquam explicabo sapiente doloremque perspiciatis
         		 qui iste ipsa consectetur suscipit eum totam laborum quidem quam sint ducimus fugit dolorem illum doloribus!
	    		Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
	   			 Aliquid cum quasi nulla molestias accusamus aspernatur 
	    		reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. 
	    		Repellat provident explicabo accusamus autem perspiciatis. 
	    		Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
	    		Esse architecto modi ratione porro magnam explicabo! 
	    		Porro dolore aut nam sed officiis dolores unde quo nostrum vero earum error ipsum cumque? 
	   			Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
	    		Facere aliquam explicabo sapiente doloremque perspiciatis qui iste ipsa consectetur suscipit eum totam
	     		laborum quidem quam sint ducimus fugit dolorem illum doloribus!
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
			<div class="panel-heading "><h4>Your Info</h4></div> 
			<div class="panel-body" id="below"> 
				<p class="bg-info"> Username : <?php echo $username; ?> </p>
        		<p class="bg-info"> I'm a : <?php printf("$mentorString,  $menteeString")?> </p>
        		<p class="bg-info"> Looking for a match : <?php echo $lookingForMatchString?></p>
       			<p class="bg-info"> My interest : 
       				 <?php 
         				 $data = myInterest($username);
         				 foreach($data as $row)
          				{
           					 foreach($row as $name => $value)
            				{
              					$interestName = getInterestName($value);
             					 print " $interestName,";
            				}
          				}
       				 ?></p>

        		<p class="bg-info"> My mentor : 
        			<?php 
          				$mentorUsername = getMentorUsername($username);
         				 if($mentorUsername == null)
            			printf("There is no mentor connection!");
          				else
           			    printf("$mentorUsername"); 

        		?> </p>

       			 <p class="bg-info"> My mentee : 
        			<?php
          				$menteeUsername = getMenteeUsername($username);
         				 if($menteeUsername == null)
          				  printf("There is no mentees connection!");
          					else
           				 printf("$menteeUsername"); 
       				 ?> </p>
			</div>    
		</div>
	</div>
</div>
</div>
  <?php include 'registerThankYou.html' ;
  echo "<p>" . $_SERVER['HTTP_REFERER'] . "</p>";
  ?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script> 
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/custom.js"></script>
  
</body>


</html>
