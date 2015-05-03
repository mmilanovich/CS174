<?php
	session_start();
	$username = $_SESSION['username'];
	$interest = $_GET['interest'];
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		// Add a new interest & 
		// Add into user's list of interest
		$query = "INSERT INTO `MentorWeb`.`interests` (`id`, `interest`)
		          VALUES (NULL, :interest);

		          INSERT INTO `MentorWeb`.`user_interests` (`user_id`, `interest_id`) 
		          SELECT :username, interests.id
		          FROM interests
		          WHERE interest = :interest";

		$ps = $con->prepare($query);
		$ps->bindParam(':username', $username);
		$ps->bindParam(':interest', $interest);
		$ps->execute();
		
		header('Location: profilePage.php'); 
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p> $ex";
	}
?>