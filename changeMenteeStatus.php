<?php
   //session_start();
   include('session.php');
   $username = $_SESSION['username'];
   

   include('mentorMenteeFunctions.php');

   if($mentee == 1)
      updateMenteeStatus($username, 0);
    else
      updateMenteeStatus($username, 1);
   header('Location: profilePage.php'); 
?>