<!doctype html>

<?php
session_start();
?>
<head>
    <title>transparent login form</title>
    <link rel="stylesheet" type="text/css" href="Loginstyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-bar" style="position: absolute;">

  <!-- Navbar on small screens -->
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a href="main.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="downloads.php" class="w3-bar-item w3-button w3-padding-large">Downloads</a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Sign In</a>
    <a href="About-Us.php" class="w3-bar-item w3-button w3-padding-large">About Us</a>
        <?php if (isset($_SESSION['user_id'])) echo "<a href='logout.php' class='w3-bar-item w3-button w3-padding-large' style='float: right;'>Logout</a>"
        ?>
  </div>
</div>
    <div class="contact-form">
        <img src="2.jpg" class="avatar">
        <h2>About US</h2>
        <p>We are a team of 3 data scientists and full stack developers who are interested in making this world a better place.
        This Website is dedicated to Climate Ethusiasts and Data Scientists alike. There are many reports which can downloaded.
        In Today's world, Data is gold. And reliable data has become a difficult thing to get. So we have thought of making even the data freely available.
        </p>

    </div>
</body>
</html>