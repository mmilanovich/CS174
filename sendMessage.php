<?php
	session_start();
	$userID = $_SESSION['username'];
	$recipient = $_POST['recipient'];
	$body = $_POST['body'];
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
						   
		$sql = "INSERT INTO messages (senderID, recipientID, messageBody) VALUES (:user, :recipient, :body)";

		$q = $con->prepare($sql);
		$q->execute(array(':user' => $userID,
						  ':recipient' => $recipient,
					  	  ':body' => $body));
	
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
?>