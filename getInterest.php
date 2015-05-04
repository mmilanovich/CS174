<?php
	session_start();
	
	$view = $_POST ['viewprofile'];
	
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
						   
		$sql = "SELECT interest  
				FROM user_interests, interests 
				WHERE user_id=:user and
				interest_id = id ";

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