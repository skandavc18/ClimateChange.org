<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Loginstyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="w3-bar" style="position: absolute;">
        
            <!-- Navbar on small screens -->
            <div class="w3-bar w3-red w3-card w3-left-align w3-large">
                <a href="main.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
                <a href="register.php" class="w3-bar-item w3-button w3-padding-large">Register</a>
                <a href="downloads.php" class="w3-bar-item w3-button w3-padding-large">Downloads</a>
                <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Sign In</a>
                <a href="About-Us.html" class="w3-bar-item w3-button w3-padding-large">About Us</a>
                    <?php if(isset($_SESSION['user_id'])) echo "<a href='logout.php' class='w3-bar-item w3-button w3-padding-large' style='float: right;'>Logout</a>"
                        ?>
            </div>
        </div>
            <div class="contact-form">
                <img src="2.jpg" class="avatar">
                <center><font style="font-size: 40;color: azure">Done !<br></font><center>
                    <br>
                <center>
                    <p>Would You Like to go to Sign In Page?</p>
                    <br>
                    <br>
                    <a href="login.php" class="w3-bar-item w3-button w3-black w3-padding-large">Sign In</a>
                <center>
            </div>
    </body>
</html>