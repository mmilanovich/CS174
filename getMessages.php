<?php
	session_start();
	$userID = $_SESSION['username'];
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
						   
		$sql = "SELECT * from messages WHERE senderID=:user OR recipientID=:user";

		$q = $con->prepare($sql);
		$q->execute(array(':user' => $userID));
		$rows = $q->fetchAll();
		if (count($rows) == 0) {
			echo 'no classes';
		} else {
			echo json_encode($rows);
		}
	
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
?>