<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ordering System</title>
</head>
<body>
    <div>
        <p>
            <?php
            //Connect to mySQL
            $host = "devweb2019.cis.strath.ac.uk";
            $user = "iyb19179";
            $pass = "";
            $dbname = "iyb19179";
            $conn = new mysqli($host, $user, $pass, $dbname);

            if ($conn->connect_error) {
                die("Connection failed :  ".$conn->connect_error); //FIXME remove once working
            }



            //Issue the Query
            $sql  = "SELECT * FROM `orderingsystem`";
            $result = $conn->query($sql);

            if (!$result)  {
                die("Query failed ".$conn->error); //FIXME remove once working
            }

            //Handle the results
            echo "<p>".$result->num_rows." rows found.</p>";



            //Close the connection

            $conn->close();

            ?>
        </p>
    </div>
</body>
</html>