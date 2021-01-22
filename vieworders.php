<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
    <link rel="stylesheet" type="text/css" href="orders_css.css"/>
    <style>

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: darksalmon;
            overflow-x: hidden;
            transition: 1s;
            padding-top: 100px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-family: "Courier New";
            font-size: 25px;
            color: black;
            display: block;
        }

        .sidenav a:hover {
            color: white;
            background: lightsalmon;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-right: 50px;
        }

        #main {
            transition: margin-right .5s;
            padding: 16px;
        }

    </style>

    <style>

        #header {
            text-align: center;
        }
    </style>

<!--adds a password so only Cara can access the order data-->
    <SCRIPT>
        function passWord() {
            var testV = 1;
            var pass1 = prompt('Enter Password:');
            while (testV < 3) {
                if (!pass1)
                    history.go(-1);
                if (pass1.toLowerCase() == "hellocara") {
                    alert('Welcome Cara!');
                    break;
                }
                testV+=1;
                var pass1 =
                    prompt('Access Denied - Password Incorrect, Please Try Again.','Password');
            }
            if (pass1.toLowerCase()!="password" & testV ==3)
                history.go(-1);
            return " ";
        }
    </SCRIPT>

</head>
<body onload = "passWord()">

<div id="main">
    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>
    <p>
    <h1 id = "header">View Orders</h1>

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
        $sql  = "SELECT * FROM `vieworders`";
        $result = $conn->query($sql);

        if (!$result)  {
            die("Query failed ".$conn->error); //FIXME remove once working
        }

        //Handle the results
        if ($result->num_rows > 0) {
            echo "<table>\n";

//table headers
            echo "<th>Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Email</th>";
            echo "<th>Postal</th>";
            echo "<th>ArtID</th>";
            echo "<th>ArtName</th>";

            while($row = $result->fetch_assoc()) {

//rows
                echo "<tr>\n";
                echo "<td>".$row["Name"];
                echo "<td>".$row["Phone"];
                echo "<td>".$row["Email"];
                echo "<td>".$row["Postal"];
                echo "<td>".$row["ArtID"];
                echo "<td>".$row["ArtName"];
                echo "</tr>\n";

            }
            echo "</table>\n";



        }


        //Close the connection
        $conn->close();

        ?>

    </p>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/listart.php">Art Gallery</a>
    <a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/signin.php">Check Status</a>
</div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginRight= "0";
    }
</script>
</body>
</html>