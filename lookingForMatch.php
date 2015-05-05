<?php
   //session_start();
   include('session.php');
   $username = $_SESSION['username'];
   

   include('mentorMenteeFunctions.php');

   if($lookingForMatch == 1)
      updateLookingForMatch($username, 0);
    else
      updateLookingForMatch($username, 1);
   header('Location: profilePage.php'); 
?>