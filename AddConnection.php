<?php
	$mentor = $_POST['mentor'];
	$mentee = $_POST['mentee'];
	
	try {
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = "
				INSERT INTO mentor_mentee (mentor_user_id, mentee_user_id)
				VALUES ('$mentor', '$mentee')";
		$q = $con->prepare($sql);
		$q->execute();
		header('Location: profilePage.html'); 
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p> $ex";
	}
?>