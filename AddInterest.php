<?php
	session_start();
	$username = $_SESSION['username'];
	$interest = $_GET['interest'];
	try {
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		try { 
			$sql = "
					INSERT INTO interests (interest)
					VALUES ('$interest')";
			$q = $con->prepare($sql);
			$q->execute();
		} catch(PDOException $ex) {
		}
		$sql = "
			INSERT INTO user_interests (user_id, interest_id)
			SELECT username, id
			FROM interests, userdata
			WHERE interest='$interest' AND username='$username'
			";
		$q = $con->prepare($sql);
		$q->execute();
		header('Location: profilePage.html'); 
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p> $ex";
	}
?>