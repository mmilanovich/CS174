<?php
	session_start();
	$userID = $_SESSION['username'];
	$reviewee = $_POST['viewprofile'];
	//$reviewee = 'gary';
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT reviewerID, stars, messageBody FROM reviews WHERE reviewerID!=:user AND revieweeID=:reviewee";
		$q = $con->prepare($sql);
		$q->execute(array(':user' => $userID, ':reviewee' => $reviewee));
		$rows = $q->fetchAll();
		echo json_encode($rows);
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
?>