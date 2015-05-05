<?php
	session_start();
	$userID = $_SESSION['username'];
	//$userID = 'malcolm';
	$revieweeID = $_POST['viewprofile'];
	//$revieweeID = 'gary';
	$stars = $_POST['stars'];
	//$stars = 5;
	$messageBody = $_POST['messageBody'];
	//$messageBody = "hi";
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
				 
		$sql = "REPLACE INTO reviews 
				VALUES (:userID, :revieweeID, :stars, :messageBody); ";


		$q = $con->prepare($sql);
		$q->execute(array(':userID' => $userID, ':revieweeID' => $revieweeID, ':stars' => $stars, ':messageBody' => $messageBody));
		//$rows = $q->fetchAll();
		echo "revieweeID : ".$revieweeID;
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
?>