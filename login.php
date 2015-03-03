<?php
	session_start();
?>
<html>
<head>
</head>
<body>
<?php
	try {
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
		if (isset($_POST['submitLogin'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			checkIfUserExists($_POST['username'], $_POST['password']);
		} 
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p> $ex";
	}
/*
function connect() {
	return mysqli_connect("localhost", "root", "root", "mentorweb");
}
*/

function checkIfUserExists($username, $password) {
	global $con;
	$sql = "
			SELECT * 
			FROM userData
			WHERE username=:username AND password=:password
			LIMIT 1";
	$q = $con->prepare($sql);
	$q->execute(array(':username' => $username, ':password' => $password));
	$rows = $q->fetchAll(PDO::FETCH_ASSOC);
	if (count($rows) == 0) {
		echo "No matching row    $username 	$password";
		return 0;
	} else {
		//foreach ($rows as $user)
		$_SESSION['username'] = $username;
		header('Location: profilePage.html');   
	    return 1;
	}
}
?>
</body>
</html>