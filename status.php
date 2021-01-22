<?php


//Connect to mySQL
$host = "devweb2019.cis.strath.ac.uk";
$user = "iyb19179";
$pass = "";
$dbname = "iyb19179";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed :  ");
}

//setting up variables
$emailsignin = isset($_POST["EmailSignIn"]) ? $conn->real_escape_string($_POST["EmailSignIn"]) : "";
$passwordsignin = isset($_POST["PasswordSignIn"]) ? $conn->real_escape_string($_POST["PasswordSignIn"]) : "";

//create the sql query and run it

$sql  = "INSERT INTO `register` (`id`, `EmailSignIn`, `PasswordSignIn`) VALUES "
    ."(NULL, '$emailsignin', '$passwordsignin');";


if($conn->query($sql)===TRUE) {

} else {
    die("Error on insert ".$conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Status </title>
    <link rel="stylesheet" type="text/css" href="orders_css.css"/>

    <!--navigation sidebar-->
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
        table {
            align-content: center;
        }

        #header {
            text-align: center;
        }

        #drying {
            text-align: center;
        }
    </style>

</head>
<body>


<div id="main">

    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>

    <p>
    <h1 id = "header">Order Status</h1>
    <p id = "drying">Currently: Still drying...</p>

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