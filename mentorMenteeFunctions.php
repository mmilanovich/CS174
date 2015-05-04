<?php

function myMentors($username)
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
      $ps->bindParam(':interest', $interest);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      header('Location: index.html'); 
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
   }

}

function myMentees($interest)
{
   $interest = $_GET['interest'];
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      // Add a new interest & 
      // Add into user's list of interest
      $query = "INSERT INTO `MentorWeb`.`interests` (`id`, `interest`)
                VALUES (NULL, :interest)";

      $ps = $con->prepare($query);
      $ps->bindParam(':interest', $interest);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);
      
      header('Location: index.html'); 
   } catch(PDOException $ex) {
      echo "<p>Failed to add interest</p> $ex";
   }

}

function updateMenteeStatus($username, $mentee)
{
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "UPDATE `MentorWeb`.`userdata` 
                SET `mentee` = :mentee WHERE `userdata`.`username` = :username;";
                  
      $ps = $con->prepare($query);
      $ps->bindParam(':username', $username);
      $ps->bindParam(':mentee', $mentee);
      $ps->execute();
      header('Location: index.html'); 
   }
   catch(PDOException $ex) {
      echo "<p>Failed to removeInterest</p> $ex";
   }
}


function updateMentorStatus($username, $mentor)
{
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "UPDATE `MentorWeb`.`userdata` 
                SET `mentor` = :mentor WHERE `userdata`.`username` = :username;";
                  
      $ps = $con->prepare($query);
      $ps->bindParam(':username', $username);
      $ps->bindParam(':mentor', $mentor);
      $ps->execute();
      header('Location: index.html'); 
   }
   catch(PDOException $ex) {
      echo "<p>Failed to removeInterest</p> $ex";
   }
}

function updateLookingForMatch($username, $indicator)
{
   try {
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "UPDATE `MentorWeb`.`userdata` 
                SET `lookingForMatch` = :indicator 
                WHERE `userdata`.`username` = :username;";

      $ps = $con->prepare($query);
      $ps->bindParam(':username', $username);
      $ps->bindParam(':indicator', $indicator);
      $ps->execute();
      header('Location: index.html'); 
   }
   catch(PDOException $ex) {
      echo "<p>Failed to removeInterest</p> $ex";
   }
}

// Not Done yet
function getMentorMenteeInterest($myUsername,$partnerUsername)
{
   try{
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "SELECT mentor_user_id from mentor_mentee WHERE mentee_user_id = :myUsername";
      
      $ps = $con->prepare($query);
      $ps->bindParam(':myUsername', $myUsername);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      $interest = $data[0]['mentor_user_id'];
      return $mentorUsername;
   }
   catch(PDOException $ex) {
      echo "<p>Failed to getInterestID()</p> $ex";
   }

}

function getMentorUsername($myUsername)
{
   try{
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "SELECT mentor_user_id from mentor_mentee WHERE mentee_user_id = :myUsername";
      
      $ps = $con->prepare($query);
      $ps->bindParam(':myUsername', $myUsername);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      $mentorUsername = $data[0]['mentor_user_id'];
      return $mentorUsername;
   }
   catch(PDOException $ex) {
      echo "<p>Failed to getInterestID()</p> $ex";
   }
}

function getMenteeUsername($myUsername)
{
   try{
      $con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $query = "SELECT mentee_user_id from mentor_mentee WHERE mentor_user_id = :myUsername";
      
      $ps = $con->prepare($query);
      $ps->bindParam(':myUsername', $myUsername);
      $ps->execute();
      $data = $ps->fetchALL(PDO::FETCH_ASSOC);

      $menteeUsername = $data[0]['mentee_user_id'];
      return $menteeUsername;
   }
   catch(PDOException $ex) {
      echo "<p>Failed to getInterestID()</p> $ex";
   }
}

?>