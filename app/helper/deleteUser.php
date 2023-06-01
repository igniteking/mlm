<?php
include('../connection/connection.php');
$user_id = $_GET['user_id'];
$deleteUser = mysqli_query($conn, "DELETE FROM `user_data` WHERE user_id = $user_id");
if ($deleteUser) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=../users.php?status=1\">";
}
