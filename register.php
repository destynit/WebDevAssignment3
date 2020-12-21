<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="orders_css.css"/>
    <style>
        h1 {
            text-align: center;
        }

    </style>
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

    </style>


</head>
<body>
    <div id="main">
        <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open for more details</span>

        <form action = "status.php" method = "post">
            <h2>Register Here: </h2>
            <p class = "signup">(sign up to get updates on your order)</p>
            <p>Email: <input type = "text" name = "EmailSignIn" required/></p>
            <p>Password: <input type = "password" name = "PasswordSignIn" required/></p>
            <button onclick = "success()">Register</button><br/>
        </form>



    </div>




    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/listart.php">Art Gallery</a>
        <a href="https://devweb2019.cis.strath.ac.uk/~iyb19179/OrderingSystem/signin.php">Check Status</a>
    </div>
    <script>
        function success() {
            alert("You are successfully registered!");
        }
    </script>


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