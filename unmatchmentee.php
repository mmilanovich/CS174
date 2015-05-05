<?php
	include('session.php');
	include('mentorMenteeFunctions.php');
	$username = $_SESSION['username'];
	
	unmatchMeWithMentee($username);
	header('Location: profilePage.php'); 
?>