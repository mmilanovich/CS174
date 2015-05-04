<?php
include('session.php');
include('interestFunctions.php');

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

<body>
	<form action="SearchForMatch.php" method="GET">
	<div class="col-lg-6 searchbar">
		<label>Find a mentor or mentee</label>
	    <div class="input-group">  
	      	<input type="text" class="form-control" name="interest" placeholder="Search for an interest...">
	      	<span class="input-group-btn">
	        	<button type="submit" class="btn btn-default" type="button">Go!</button>
	      	</span>		  
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	</form>
	<form action="AddInterest.php" method="GET">
	<div class="col-lg-6 searchbar">
		<label>Add an interest</label>
	    <div class="input-group">  
	      	<input type="text" class="form-control" name="interest" placeholder="Name of an interest...">
	      	<span class="input-group-btn">
	        	<button type="submit" class="btn btn-default" type="button">Add it!</button>
	      	</span>		  
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	</form>
	<br>
  <div class="wrapper">
    <h1>Mentor Web</h1>
    <p>An sample layout for user profile</p>
    
	<br/>
	<a href="message.html"><button class="btn btn-default" type="button">Message A Contact</button><a/>
    <div class="container clearfix">
    
    
      <div class="primary">
        <h2>Profile of</h2>
        <h3><?php printf("$firstName $lastName")?></h3>
        
        
        <h3 class="special">Biography</h3>
        <img src="http://newarkpatrioticfund.co.uk/wp-content/uploads/2014/05/profile-placeholder.jpg"></img>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse architecto modi ratione porro magnam explicabo! Porro dolore aut nam sed officiis dolores unde quo nostrum vero earum error ipsum cumque? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere aliquam explicabo sapiente doloremque perspiciatis qui iste ipsa consectetur suscipit eum totam laborum quidem quam sint ducimus fugit dolorem illum doloribus!
	    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse architecto modi ratione porro magnam explicabo! Porro dolore aut nam sed officiis dolores unde quo nostrum vero earum error ipsum cumque? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere aliquam explicabo sapiente doloremque perspiciatis qui iste ipsa consectetur suscipit eum totam laborum quidem quam sint ducimus fugit dolorem illum doloribus!

      	</p>

        
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


      	<p class="userInfo"> Username : <?php echo $username; ?> </p>
        <p class="userInfo"> I'm a : <?php printf("$mentorString,  $menteeString")?> </p>
        <p class="userInfo"> Looking for a match : <?php echo $lookingForMatchString?></p>
        
        <?php
        $data = myInterest($username);
        //print_r($data);
        // We're going to construct an HTML table.
                print "<table border='1'>\n";
                print "
                <tr>
                  <td>My Interest</td>
                <tr>
                ";
                
                // Construct the HTML table row by row.
                foreach ($data as $row) { 
                    print "            <tr>\n";
                    
                    foreach ($row as $name => $value) {
                          $interestName = getInterestName($value);

                        print "<td>$interestName</td>\n";
                    }
                    
                    print "            </tr>\n";
                }



                
                print "        </table>\n<br>";
        ?>

        <form action="removeInterest.php" method="get">
        <fieldset>
            <legend>Remove one of my interest</legend>
            <p>
                <label>Interest : </label>
                <input name="interest" type="text">
            </p>
            
            <p>
                <input type="submit" value="Submit">
            </p>
            
            
            
        </fieldset>
    </form>


      </div>
      
      
      <div class="secondary">
        <h2>Side Menu</h2>
        <p><a href="updateInterest"> <font color="red">Click here to update my interest!</p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      	</p>
      	

        <div class="menuBar">
        <a href="menu1.html" class="menuLink">Home</a>
        <ul class="menu" id="menu1">
            <li><a href="pg1.html">About Us</a></li>
            <li><a href="pg2.html">Contact Us</a></li>
            <li><a href="pg3.html">Donate</a></li>
            <li><a href="connection.php"> My Connections</a></li>
        </ul>
        </div>
        <div class="menuBar">
        <a href="menu2.html" class="menuLink">Contact Us</a>
        <ul class="menu" id="menu2">
            <li><a href="pg5.html">Send eMail</a></li>
            <li><a href="pg6.html">Facebook</a></li>
            <li><a href="pg7.html">Twitter</a></li>
        </ul>
        </div>
        <div class="menuBar">
        <a href="menu3.html" class="menuLink"><?php printf("$firstName $lastName")?></a>
        <ul class="menu" id="menu3">
            <li><a href="pg8.html">Find a Match</a></li>
            <li><a href="pg9.html">Update Status</a></li>
            <li><a href="pg9.html">Log Out</a></li>
        </ul>
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
