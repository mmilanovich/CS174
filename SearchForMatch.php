<?php
	session_start();
	$interest = $_GET['interest'];
	$username = $_SESSION['username'];
	global $names;
	$mentor = 0;
	$mentee = 0;
	if (isset($_GET['mentor'])) {
		$mentor = 1;
	} else if (isset($_GET['mentee'])) {
		$mentee = 1;
	}
	
	try {
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = "
				SELECT userdata.username, userdata.mentor, userdata.mentee
				FROM userdata, interests, user_interests
				WHERE interest=:interest AND interests.id = user_interests.interest_id AND user_interests.user_id = userdata.username AND userdata.username != '$username';";
		$q = $con->prepare($sql);
		$q->execute(array(':interest' => $interest));
		$names = $q->fetchAll();
		
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p> $ex";
	}
	
?>

<html>
<head>
<title>Find a Connection</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>

<body style="background-image: url('photos/connection.jpg');">
<div class="row"><br>	
	<div class="col-lg-10  col-lg-offset-1">
		<a href="profilePage.php" class="btn btn-primary btn-block">
   		 <span class="glyphicon glyphicon-arrow-left"></span> Back
 		</a>
 		<h1 style="color:white; background:#337ab7; text-align:center;">Add Connections</h1>
	<div class="panel panel-primary">
		<div class="panel-heading"><h2>Mentors</h2></div>
		<div class="panel-body">
			<?php
				for ($i = 0; $i < count($names); $i++) {
				if ($names[$i]["mentor"] == 1) {
				echo '<form action="AddConnection.php" method="POST">
				<input type="hidden" name="mentor" value="'.$names[$i]["username"].'">
				<input type="hidden" name="mentee" value="'.$username.'">
				<button  type="submit" name="submitMatch" class="btn btn-info viewprofile"><span class="glyphicon glyphicon-user"></span>
           		 Match me with '.$names[$i]["username"].'</button></form>';
					}
				}			
	
			?>
		</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-10  col-lg-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading"><h2>Mentees</h2></div>
		<div class="panel-body">
			<?php
				for ($i = 0; $i < count($names); $i++) {
				if ($names[$i]["mentee"] == 1) {
				echo '<form action="AddConnection.php" method="POST">
				<input type="hidden" name="mentor" value="'.$username.'">
				<input type="hidden" name="mentee" value="'.$names[$i]["username"].'">
				<button  type="submit" name="submitMatch" class="btn btn-info viewprofile" 
				data-name-n="'.$names[$i]["username"].'"><span class="glyphicon glyphicon-user"></span>
            	Match me with '.$names[$i]["username"].'</button></form>';
					}
				}
			?>
		</div>
	</div>
	</div>
</div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>