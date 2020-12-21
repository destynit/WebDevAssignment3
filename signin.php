<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign-In </title>
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
        .cara {
            padding-top: 30rem;
        }
    </style>
    <style>
        table {
            align-content: center;
        }

        #header {
            text-align: center;
        }
    </style>

</head>
<body>


<div id="main">

    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>

    <p>
    <?php

    //Connect to mySQL
    $host = "devweb2019.cis.strath.ac.uk";
    $user = "iyb19179";
    $pass = "dengeiph6Tai";
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
    }
    //Close the connection
    $conn->close();
    ?>
        <h1>Sign In to Check Your Order Status</h1>
        <p>Email: <input type = "email" name = "Email" required/></p>
        <p>Password: <input type = "password" name = "Password" required/></p>
    <p><button onclick = "window.location.href= 'status2.php'">Sign-In</button></p>
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