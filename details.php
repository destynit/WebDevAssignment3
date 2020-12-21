<?php


//Connect to mySQL
$host = "devweb2019.cis.strath.ac.uk";
$user = "iyb19179";
$pass = "dengeiph6Tai";
$dbname = "iyb19179";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed :  ");
}


//Get art ID
$userid =$conn->real_escape_string($_GET["ID"]);

if ($userid == NULL) {
    die("No order chosen. ");
}

//Issue the Query
$sql  = "SELECT *  FROM `orderingsystem` WHERE `ID` = $userid";
$result = $conn->query($sql);

if (!$result)  {
    die("Query failed ");
}

//Handle the results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $artid = $conn->real_escape_string($row["ID"]);
        $artname = $conn->real_escape_string($row["Name"]);
        $artdate = $conn->real_escape_string($row["Date (yyyy/mm/dd)"]);
        $artwidth = $conn->real_escape_string($row["Width (mm)"]);
        $artheight = $conn->real_escape_string($row["Height (mm)"]);
        $artprice = $conn->real_escape_string($row["Price"]);
        $artdescription = $conn->real_escape_string($row["Description"]);
        $artphoto = '<img src = "data:image/jpeg;base64,'.base64_encode($row['Preview']).'" width = "70%" height = "140%" align = "right">';



    }
}

//Close connection
$conn->close();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>More Details</title>
    <link rel="stylesheet" type="text/css" href="orders_css.css"/>
    <style>

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: darksalmon;
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
        p {
            font-size: 110%;
        }

    </style>

</head>
<body>

<div id="main">
    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>

    <!--   <h1>Order Form</h1>-->


        <h1>Details</h1>
        <p><?php

            echo "<p>".$artphoto."</p>";
            echo "<h2>".$artname."</h2>";
            echo "<table>\n";
            echo "<tr><td><b><p> ID: ".$artid."</p></b></td></tr>";
            echo "<tr><td><b><p> Date Created: ".$artdate."</p></b></td></tr>";
            echo "<tr><td><b><p>Width: ".$artwidth."mm</p></b></td></tr>";
            echo "<tr><td><b><p>Height: ".$artheight."mm</p></b></td></tr>";
            echo "<tr><td><b><p>Price: £".$artprice."</p></b></td></tr>";
            echo "<tr><td><b><p>".$artdescription."</p></b></td></tr>";
            echo "<tr><td><button onclick = \"window.location.href= 'listart.php'\">Back to Gallery</button>"."         "."<button onclick='window.location.href=\"order.php?ID=".$userid."\"'>Order Painting</button></td></tr>";

        ?></p>
    <p>

    </p>

        <input type="hidden" name="artid" value="<?php echo $artid; ?>">
        <input type="hidden" name="artname" value="<?php echo $artname; ?>">



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