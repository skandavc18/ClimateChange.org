<?php 
require('db_connect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])) {

    $user = $_POST['user_id'];
    $pass = $_POST['user_pass'];

    $query = "INSERT INTO user_login VALUES ('$user','$pass')";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    header('Location: success.php');
}
?>