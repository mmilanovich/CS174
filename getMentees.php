<?php
	session_start();
	
	$view = $_POST ['viewprofile'];
	
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
						   
		$sql = "SELECT mentee_user_id  FROM mentor_mentee WHERE mentor_user_id=:user";

		$q = $con->prepare($sql);
		$q->execute(array(':user' => $view));
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