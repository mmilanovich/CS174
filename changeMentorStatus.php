<?php
   //session_start();
   include('session.php');
   $username = $_SESSION['username'];
   

   include('mentorMenteeFunctions.php');

   if($mentor == 1)
      updateMentorStatus($username, 0);
    else
      updateMentorStatus($username, 1);
   header('Location: profilePage.php'); 
?>