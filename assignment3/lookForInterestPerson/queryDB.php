<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Query Results</title>
</head>

<body>
    <h1>Query Results</h1>
    
    <p>
        <?php
            $firstNm = filter_input(INPUT_GET, "first");
            print "<p>Showing $firstNm's mentee(s) </p>";
            
            try {
                // Connect to the database.
                // localhost dbname dbuser dbpass
                $con = new PDO("mysql:host=localhost;dbname=mentorweb",
                               "williyanson", "password");
                $con->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);
                
                // Select firstNm mentee
                $query = "SELECT  interest
				FROM userdata, interests, user_interests
				WHERE firstName = :firstNm AND
					(mentee = user_id OR mentor = user_id) AND
					id = interest_id";
                	
                $ps = $con->prepare($query);
                
                $ps->bindParam(':firstNm', $firstNm);
                $ps->execute();
                $data = $ps->fetchALL(PDO::FETCH_ASSOC);
                
                // We're going to construct an HTML table.
                print "<table border='1'>\n";
                print "
                <tr>
                	<td>Name</td>
                <tr>
                ";
                
                // Construct the HTML table row by row.
                foreach ($data as $row) { 
                    print "            <tr>\n";
                    
                    foreach ($row as $name => $value) {
                        print "                <td>$value</td>\n";
                    }
                    
                    print "            </tr>\n";
                }
                
                print "        </table>\n";
            }
            catch(PDOException $ex) {
                echo 'ERROR: '.$ex->getMessage();
            } 
        ?>
    </p>
</body>
</html>