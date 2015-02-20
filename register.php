<html>
<head>
</head>
<body>
<?php
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
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			if (checkIfUserExists($_POST['username']) == 0) {
		    	adduser($username, $password, $firstName, $lastName, $isMentor, $isMentee, $isLookingForMatch);
			}	
		} 
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
/*
function connect() {
	return mysqli_connect("localhost", "root", "root", "mentorweb");
}
*/
function addUser($username, $password, $firstName, $lastName, $isMentor, $isMentee, $isLookingForMatch) {
	global $con;
	$sql = "
		INSERT INTO userData (username, password, firstName, lastName, mentor, mentee, lookingForMatch)
		VALUES (:username, :password, :firstName, :lastName, :isMentor, :isMentee, :isLookingForMatch)";
	$q = $con->prepare($sql);
	$q->execute(array(':username'=>$username,
					  ':password'=>$password,
					  ':firstName'=>$firstName,
					  ':lastName'=>$lastName,
					  ':isMentor'=>$isMentor,
					  ':isMentee'=>$isMentee,
					  ':isLookingForMatch'=>$isLookingForMatch));
	echo "<p>Affected Rows:".$q->rowCount(); 
}

function checkIfUserExists($username) {
	global $con;
	$sql = "
			SELECT * 
			FROM userData
			WHERE username=:username
			LIMIT 1";
	$q = $con->prepare($sql);
	$q->execute(array(':username' => $username));
	$rows = $q->fetchAll(PDO::FETCH_ASSOC);
	if (count($rows) == 0) {
		return 0;
	} else {
		//foreach ($rows as $user)
		$firstName = $rows[0]['firstName'];
		$lastName = $rows[0]['lastName'];
		if ($rows[0]['mentor'] == 1) {
			$isMentor = "Yes";
		} else {
			$isMentor = "No";
		}
		if ($rows[0]['mentee'] == 1) {
			$isMentee = "Yes";
		} else {
			$isMentee = "No";
		}
		if ($rows[0]['lookingForMatch'] == 1) {
			$isLookingForMatch = "Yes";
		} else {
			$isLookingForMatch = "No";
		}
  	  	print <<<HERE
<p>
User exists!
</p>
<br/>
<table border="1">
	<tr>
		<th>Username</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Mentor</th>
		<th>Mentee</th>
		<th>Looking for Match</th>
	</tr>
	<tr>
		<td>$username</td>
		<td>$firstName</td>
		<td>$lastName</td>
		<td>$isMentor</td>
		<td>$isMentee</td>
		<td>$isLookingForMatch</td>
	</tr>
</table>		
HERE;
	    return 1;
	}
}
?>
</body>
</html>