<?php
	session_start();
	$reviewee = $_POST['viewprofile'];
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT AVG(stars) AS stars, COUNT(stars) AS count FROM reviews WHERE revieweeID=:reviewee";
		$q = $con->prepare($sql);
		$q->execute(array(':reviewee' => $reviewee));
		$rows = $q->fetchAll();
		echo json_encode($rows);
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
?>