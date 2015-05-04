<?php
	session_start();
	$userID = $_SESSION['username'];
	$viewprofile = $_POST['viewprofile'];

	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
				 
		$sql = "SELECT username, firstName, lastName, mentor, mentee, lookingForMatch
				FROM userdata 
				WHERE userdata.username =:view ";


		$q = $con->prepare($sql);
		$q->execute(array(':view' => $viewprofile));
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