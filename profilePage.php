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
  <script type="text/javascript">
      $(window).load(function(){
          $('#thankYouModal').modal('show');
      });

      setTimeout(function() { $('#thankYouModal').modal('hide'); }, 2000);
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
    
    <div class="container clearfix">
    
    
      <div class="primary">
        <h2>Profile of</h2>
        <h3>Matthew Williyanson</h3>
        
        
        <h3 class="special">Biography</h3>
        <img src="http://newarkpatrioticfund.co.uk/wp-content/uploads/2014/05/profile-placeholder.jpg"></img>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse architecto modi ratione porro magnam explicabo! Porro dolore aut nam sed officiis dolores unde quo nostrum vero earum error ipsum cumque? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere aliquam explicabo sapiente doloremque perspiciatis qui iste ipsa consectetur suscipit eum totam laborum quidem quam sint ducimus fugit dolorem illum doloribus!
	    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse architecto modi ratione porro magnam explicabo! Porro dolore aut nam sed officiis dolores unde quo nostrum vero earum error ipsum cumque? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere aliquam explicabo sapiente doloremque perspiciatis qui iste ipsa consectetur suscipit eum totam laborum quidem quam sint ducimus fugit dolorem illum doloribus!

      	</p>
      	
      	<p class="userInfo"> Username : williyanson </p>
        <p class="userInfo"> Account type : Mentor </p>
        <p class="userInfo"> I'm looking for a match!</p>
      </div>
      
      
      <div class="secondary">
        <h2>Side Menu</h2>
        
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      	</p>
      	
      	<a href="index.html">Homepage</a>
      	<a href="#">Log out</a>
      	<a href="#">Search</a>
      </div>
      
    </div>
    
    
    
  </div>
  <?php include 'registerThankYou.html' ?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script> 
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/custom.js"></script>
</body>


</html>