<?php
session_start();	
	try {
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
						  
		if (isset($_POST['submitRegister'])) {
			if ($_POST['accountType'][0] == "mentor") {
				$isMentor = 1;
                               
			} else {
				$isMentor = 0;
			}
			if ($_POST['accountType'][0] == "mentee" || $_POST['accountType'][1] == "mentee") {
				$isMentee = 1;
			} else {
				$isMentee = 0;
			}
			if ($_POST['matchStatus'] == "lookingForMatch") {
				$isLookingForMatch = 1;
			} else {
				$isLookingForMatch = 0;
			}
			//echo "made it this far";
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			if (checkIfUserExists($_POST['username']) == 0) {
                $_SESSION['username'] = $username;
				//echo "made it this far";
		    	adduser($username, $password, $firstName, $lastName, $isMentor, $isMentee, $isLookingForMatch);
				header('Location: profilePage.php');
			}	
                        
		} 
	} catch(PDOException $ex) {
            
		echo "<p>Connection failed</p>";
	}
	
function addUser($username, $password, $firstName, $lastName, $isMentor, $isMentee, $isLookingForMatch) {
	global $con;
       // echo "made it this far into add";
	$sql = "
		INSERT INTO userdata (username, password, firstName, lastName, mentor, mentee, lookingForMatch)
		VALUES (:username, :password, :firstName, :lastName, :isMentor, :isMentee, :isLookingForMatch)";
	$q = $con->prepare($sql);
	$q->execute(array(':username'=>$username,
					  ':password'=>$password,
					  ':firstName'=>$firstName,
					  ':lastName'=>$lastName,
					  ':isMentor'=>$isMentor,
					  ':isMentee'=>$isMentee,
					  ':isLookingForMatch'=>$isLookingForMatch));
}

function checkIfUserExists($username) {
	global $con;
	$sql = "
			SELECT * 
			FROM userdata
			WHERE username=:username
			LIMIT 1";
	$q = $con->prepare($sql);
	$q->execute(array(':username' => $username));
	$rows = $q->fetchAll(PDO::FETCH_ASSOC);
	if (count($rows) == 0) {
		return 0;
	} else {
		return 1;
	}
}
?>

