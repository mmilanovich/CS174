<?php
	include('session.php');
	include('mentorMenteeFunctions.php');
	$username = $_SESSION['username'];
	
	unmatchMeWithMentor($username);
	header('Location: profilePage.php'); 
?>