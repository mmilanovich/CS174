<?php
	session_start();
	$bio = $_POST['bioText'];
	$username = $_SESSION['username'];
	global $names;
	echo $_POST['bioText'];
	
	try {
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE userdata
				SET bio = :bio
				WHERE username = '$username'";
		$q = $con->prepare($sql);
		$q->execute(array(':bio' => $bio));
		header('Location: profilePage.php'); 
		
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p> $ex";
	}
	
?>