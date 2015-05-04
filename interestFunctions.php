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
      
      // Add a new interest & 
      // Add into user's list of interest
      $query = "INSERT INTO `MentorWeb`.`user_interests` (`user_id`, `interest_id`) 
                SELECT :username, interests.id
                FROM interests
                WHERE interest = :interest";

      $ps = $con->prepare($query);
      $ps->bindParam(':username', $username);
      $ps->bindParam(':interest', $interest);
      $ps->execute();
      header('Location: profilePage.php'); 
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
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
      $query = "SELECT interest FROM interests WHERE interest = :interest";

      $ps = $con->prepare($query);
      $ps->bindParam(':interest', $interest);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      if (count($rows) == 0) 
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