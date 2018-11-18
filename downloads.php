<?php
session_start();
?>

<head>
    <title>transparent login form</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
            body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("bg1.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);
            z-index: -1;
        }
            .padding{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
            color:whitesmoke;
        }
            .avatar {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            top: calc(-80px/2);
            left: calc(50% - 40px);
        }
    </style>
</head>

<body>
    <div class="w3-bar">

        <!-- Navbar on small screens -->
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a href="main.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
            <a href="register.php" class="w3-bar-item w3-button w3-padding-large">Register</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Sign In</a>
            <a href="About-Us.php" class="w3-bar-item w3-button w3-padding-large">About Us</a>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" style="float: right;">Logout</a>
                    <?php if (isset($_SESSION['user_id'])) echo "<a href='logout.php' class='w3-bar-item w3-button w3-padding-large' style='float: right;'>Logout</a>"
                    ?>
        </div>
        <div class="w3-container padding">
            <img src="2.jpg" class="avatar">
            <?php if (isset($_SESSION['user_id']))
             echo "<p><center>hello ", $_SESSION['user_id'],"!</center></p>
            <p><center>Welcome to Downloads Section</center></p>
            <p>Please click on the link to download the data you want</p>
            <ul>
            <li><a href='data.csv' >Historical Temperature Data</a>
            <li><a href='worldcities.csv' >Cities Data</a>
            </ul>";
            else
            echo "<p><center>Please Login First !</p></center>"
            ?>
        </div>

    </div>
</body>
