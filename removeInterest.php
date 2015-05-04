<?php
include('session.php');
include('interestFunctions.php');

$interest = filter_input(INPUT_GET, "interest");
removeUserInterest($username, $interest);


?>