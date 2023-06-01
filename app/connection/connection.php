<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mlm";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
date_default_timezone_set('Asia/Kolkata');
if (isset($_SESSION['email'])) {
    $email = $_SESSION["email"];
    $id = $_SESSION['user_id'];
} else {
    $email = "No User";
}
?>