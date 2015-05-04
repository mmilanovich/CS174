<?php

function myInterest($username)
{
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      $query = "SELECT interest_id FROM user_interests WHERE user_id = :username";

      $ps = $con->prepare($query);
      $ps->bindParam(':username', $username);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);
      //print_r($data);
      return $data;

   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
   }
}

function addUserInterest($username, $interest)
{
   $interest = $_GET['interest'];
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      

      // Validation does not works  because of header line
      // on addInterest.php it will redirects to profilePage.php
      // without showing an error. More over, no duplicate will be allowed
      //if(checkInterestExist($username, $interest) == false)
      //{
         $query = "INSERT INTO `MentorWeb`.`user_interests` (`user_id`, `interest_id`) 
                SELECT :username, interests.id
                FROM interests
                WHERE interest = :interest";

         $ps = $con->prepare($query);
         $ps->bindParam(':username', $username);
         $ps->bindParam(':interest', $interest);
         $ps->execute();
         header('Location: profilePage.php'); 
      //}
      printf("<p>This shoud not print out</p>");
      // goes here, so it's true, they think it exist
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest to user</p> $ex";
   }

}

function addInterest($interest)
{
   $interest = $_GET['interest'];
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      if(checkInterestExist($interest) == false)
      {
         $query = "INSERT INTO `MentorWeb`.`interests` (`id`, `interest`)
                VALUES (NULL, :interest)";

         $ps = $con->prepare($query);
         $ps->bindParam(':interest', $interest);
         $ps->execute();
         header('Location: profilePage.php'); 
      }

      //$check = checkInterestExist($interest);
      //printf("Some random");
      //printf("<p> checking : $check </p>");
      //printf("Not adding");
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
   }

}


// Not correctly implement but currently not used
function checkUserInterestExist($username, $interest)
{
   //$interest = $_GET['interest'];
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      $interest_id = getInterestID($interest);
      // Add a new interest & 
      // Add into user's list of interest
      $query = "SELECT user_id FROM user_interests WHERE interest_id = :interest_id";


      $ps = $con->prepare($query);
      $ps->bindParam(':interest_id', $interest_id);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);
      // should not have any value
      if (count($data) == 0) 
         return false;
      else
         return true;
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
   }

}


function checkInterestExist($interest)
{
   $interest = $_GET['interest'];
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      // Add a new interest & 
      // Add into user's list of interest


      $interest_id = getInterestID($interest);
      $query = "SELECT interest FROM interests WHERE id = :interest_id";

      $ps = $con->prepare($query);
      $ps->bindParam(':interest_id', $interest_id);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      if (count($data) == 0) 
         return false;
      else
         return true;
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
   }

}


function removeUserInterest($username, $interest)
{
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $interest_id = getInterestID($interest);
      $query = "DELETE FROM `MentorWeb`.`user_interests`
                WHERE `user_interests`.`user_id` = :username AND `user_interests`.`interest_id` = :interest_id";
                  
      $ps = $con->prepare($query);
      $ps->bindParam(':interest_id', $interest_id);
      $ps->bindParam(':username', $username);
      $ps->execute();
      header('Location: profilePage.php'); 
   }
   catch(PDOException $ex) {
      echo "<p>Failed to removeInterest</p> $ex";
   }
}

function removeInterest($interest)
{
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $interest_id = getInterestID($interest);

      $query = "DELETE FROM `MentorWeb`.`interests` 
                WHERE `interests`.`id` = :interest_id";

      $ps = $con->prepare($query);
      $ps->bindParam(':interest_id', $interest_id);
      $ps->execute();
      header('Location: index.html'); 
   }
   catch(PDOException $ex) {
      echo "<p>Failed to removeInterest</p> $ex";
   }
}

function updateUserInterest($username,$interest)
{
   removeUserInterest($username,$interest);
   addUserInterest($user, $interest);
}

function getInterestID($interest)
{
   try{
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "SELECT id from interests WHERE interest = :interest";
      
      $ps = $con->prepare($query);
      $ps->bindParam(':interest', $interest);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      $interest_id = $data[0]['id'];
      return $interest_id;
   }
   catch(PDOException $ex) {
      echo "<p>Failed to getInterestID()</p> $ex";
   }
}

function getInterestName($interestID)
{
   try{
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "SELECT interest from interests WHERE id = :interestID";
      
      $ps = $con->prepare($query);
      $ps->bindParam(':interestID', $interestID);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      $interestName = $data[0]['interest'];
      return $interestName;
   }
   catch(PDOException $ex) {
      echo "<p>Failed to getInterestID()</p> $ex";
   }
}


?>