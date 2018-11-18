<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .padding{
    margin-top: 40px;
    margin-bottom: 20px;
    margin-right: 40px;
    margin-left: 80px;
    }

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
    </style>
</head>
<body>
<div class="w3-bar" >

  <!-- Navbar on small screens -->
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a href="main.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="register.php" class="w3-bar-item w3-button w3-padding-large">Register</a>
    <a href="downloads.php" class="w3-bar-item w3-button w3-padding-large">Downloads</a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Sign In</a>
    <a href="About-Us.php" class="w3-bar-item w3-button w3-padding-large">About Us</a>
    <?php if (isset($_SESSION['user_id'])) echo "<a href='city_display.php' download class='w3-bar-item w3-button w3-padding-large' style='float: right;'>Download</a>"
    ?>
    <?php if(isset($_SESSION['user_id'])) echo "<a href='logout.php' class='w3-bar-item w3-button w3-padding-large' style='float: right;'>Logout</a>"
    ?>
  </div>
</div>
<div class="w3-container" style="margin-left: 170px;">
  <div class="w3-row-padding">
    <div class="w3-col s4 padding">
      <img src="hist.png" style="width:100%">
    </div>
    <div class="w3-col s4 padding">
      <img src="scatter.png" style="width:100%">
    </div>
  </div>
    <div class="w3-row-padding">
      <div class="w3-col s4 padding">
      <img src="box.png" style="width:100%">
    </div>
    <div class="w3-col s4 padding">
      <img src="plot.png" style="width:100%">
    </div>
  </div>
</div>
</body>
</html>
<?php 

if ($_POST['lat'] != null  and $_POST['city']!=null) {
    $city= $_POST['city'];
    $escapedArgumment = escapeshellarg($city);
    $output=shell_exec("C:\\ProgramData\\Anaconda3\\python.exe C:\\xampp\\htdocs\\project\\visualization.py $escapedArgumment");
    echo "<div class='w3-container' style=' width :40%;margin-left:470px;background: rgba(0,0,0,.5);color:whitesmoke;'><center>$city <br> $output</center></div><br>";

}
else
echo "failed";
?>