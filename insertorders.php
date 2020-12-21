<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
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


</head>
<body>

<div id="main">
    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>


    <?php

//connect to database
    $host = "devweb2019.cis.strath.ac.uk";
    $user = "iyb19179";
    $pass = "dengeiph6Tai";
    $dbname = "iyb19179";
    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed :  ".$conn->connect_error); //FIXME remove once working
    }

    $name = isset($_POST["Name"]) ? $conn->real_escape_string($_POST["Name"]) : "";
    $phone = isset($_POST["Phone"]) ? $conn->real_escape_string($_POST["Phone"]) : "";
    $email = isset($_POST["Email"]) ? $conn->real_escape_string($_POST["Email"]) : "";
    $postal = isset($_POST["Postal"]) ? $conn->real_escape_string($_POST["Postal"]) : "";

    $artid=$_POST['artid'];
    $artname=$_POST['artname'];


    //check form is valid
    if (empty($name)) {
        echo"<p>";
        die("You need to provide a name.");}
    if (empty($phone)) {
        echo"<p>";
        die("You need to provide a phone number.");}
    if (empty($email)) {
        echo"<p>";
        die("You need to provide an email.");}
    if (empty($postal)) {
        echo"<p>";
        die("You need to provide a postal address.");}

    //create the sql query and run it
    $sql  = "INSERT INTO `vieworders` (`ID`, `Name`, `Phone`, `Email`, `Postal`, `ArtID`, `ArtName`) VALUES "
            ."(NULL, '$name', '$phone', '$email', '$postal', '$artid', '$artname');";

    if($conn->query($sql)===TRUE) {
        echo "<h2>Your order has been placed!</h2>";
    } else {
        die("Error on insert ".$conn->error);
    }
    ?>
<form action = "register.php" method = "get">
    <button>Register to Get Updates on Order Status</button>
</form>
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