<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ordering System</title>
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
        .cara {
            padding-top: 30rem;
        }
    </style>
    <style>
        table {
            align-content: center;
        }

        #header {
        }
    </style>
</head>
<body>


<div id="main">

    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>

    <p>
    <h1 id = "header">Art Gallery</h1>

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
        $sql  = "SELECT * FROM `orderingsystem` LIMIT 0,12";
        $result = $conn->query($sql);

        if (!$result)  {
            die("Query failed ".$conn->error); //FIXME remove once working
        }

//Handle the results
        if ($result->num_rows > 0) {
            echo "<table>\n";

//table headers
            echo "<th>ID</th>";
            echo "<th>Preview</th>";
            echo "<th>Name</th>";
            echo "<th>Width (mm)</th>";
            echo "<th>Height (mm)</th>";
            echo "<th>Price (£)</th>";
            echo "<th>More</th>";
            while($row = $result->fetch_assoc()) {

                echo "<tr>\n";
                echo "<td>".$row["ID"];
                echo '<td>'.'<img src = "data:image/jpeg;base64,'.base64_encode($row['Preview']).'" width = "150" height = "150">';
                echo "<td>".$row["Name"];
                echo "<td>".$row["Width (mm)"];
                echo "<td>".$row["Height (mm)"];
                echo "<td>".$row["Price"];
                echo "<td><button onclick='window.location.href=\"details.php?ID=".$row["ID"]."\"'>More</button>";
                echo "</tr>\n";
            }
            echo "</table>\n";

        }
        //Close the connection
        $conn->close();
        ?>
    <p><button onclick = "window.location.href= 'moreitems.php'">Next</button></p>
    </p>
</div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/listart.php">Art Gallery</a>
        <a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/signin.php">Check Status</a>
        <p class = "cara"><a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/vieworders.php">All Orders</a></p>
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