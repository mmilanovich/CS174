<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "root");
// Selecting Database
$db = mysql_select_db("MentorWeb", $connection);
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
//$ses_sql=mysql_query("SELECT  username
//                FROM userdata
//                WHERE username = 'user_check'", $connection);

$username = $user_check; // this needs to be removed, after sessions is corrected

// Retrieve row of information for user
$query = "SELECT  *
          FROM userdata
          WHERE userdata.username = :username";    
                    
$con = new PDO("mysql:host=localhost;dbname=MentorWeb",
               "williyanson", "password");                    
$ps = $con->prepare($query);
$ps->bindParam(':username', $username);
$ps->execute();
$data = $ps->fetchALL(PDO::FETCH_ASSOC);
                
$id = $data[0]['id'];
$username = $data[0]['username'];
$firstName = $data[0]['firstName'];
$lastName = $data[0]['lastName'];
$mentor = $data[0]['mentor'];
$mentee = $data[0]['mentee'];
$lookingForMatch = $data[0]['lookingForMatch'];


/*$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$dummy ="gitu deh";
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}*/
?>