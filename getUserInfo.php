<?php
    // Retrieve username detail
    $username = filter_input(INPUT_GET, "username");
        try {
                // Connect to the database.
                // localhost dbname dbuser dbpass
                $con = new PDO("mysql:host=localhost;dbname=MentorWeb",
                               "williyanson", "password");
                $con->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);
                
                // Retrieve row of information for user
                $query = "SELECT  *
                FROM userdata
                WHERE userdata.username = :username";    
                    
                $ps = $con->prepare($query);
                $ps->bindParam(':username', $username);
                $ps->execute();
                $data = $ps->fetchALL(PDO::FETCH_ASSOC);
                
                // Retrieve all user information
                // Below is result  from print_r($data)
                /* Array ( 
                      [0] => Array ( 
                            [id] => 1 
                            [username] => williyanson 
                            [password] => password 
                            [firstName] => Matthew 
                            [lastName] => Suryanto 
                            [mentor] => 1 
                            [mentee] => 0 
                            [lookingForMatch] => 1 
                            ) 
                    )
                 */
                //print_r($data);
                $id = $data[0]['id'];
                $username = $data[0]['username'];
                $firstName = $data[0]['firstName'];
                $lastName = $data[0]['lastName'];
                $mentor = $data[0]['mentor'];
                $mentee = $data[0]['mentee'];
                $lookingForMatch = $data[0]['lookingForMatch'];

                /*
                // For debugging purpose only
                print "<p> $id   </p>";
                print "<p> $username   </p>";
                print "<p> $firstName   </p>";
                print "<p> $lastName   </p>";
                print "<p> $mentor   </p>";
                print "<p> $mentee   </p>";
                print "<p> $lookingForMatch   </p>";
                */
            }
            catch(PDOException $ex) {
                echo 'ERROR: '.$ex->getMessage();
            } 
?>