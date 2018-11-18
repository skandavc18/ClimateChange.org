<?php

session_start();
?>
<?php 
require('db_connect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])) {
	
    $username = $_POST['user_id'];
    $password = $_POST['user_pass'];

    $query = "SELECT * FROM `user_login` WHERE username='$username' and Password='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION["user_id"] = $username;
        header('Location: downloads.php');
    }
    else {

        echo "<script type='text/javascript'>out=confirm('Invalid Login Credentials');if(out==true) window.location.replace('login.php'); else window.location.replace('main.html');</script>";
    }
}
?>