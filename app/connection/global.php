<?php
include('./connection/connection.php');
if (isset($_SESSION['email'])) {

  $fetch_all_query = "SELECT * FROM user_data WHERE email = '" . $_SESSION['email'] . "'";
  $result = mysqli_query($conn, $fetch_all_query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['user_id'];
    $email = $rows['email'];
    $username = $rows['username'];
    $user_type = $rows['user_type'];
    $number = $rows['number'];
    $active = $rows['active'];
    $bank_name = $rows['bank_name'];
    $account_number = $rows['account_number'];
    $ifsc_code = $rows['ifsc_code'];
    $pan_number = $rows['pan_number'];
    $profile_pic = $rows['profile_picture'];
    $refral_code = $rows['refral_code'];
    $sponser_id = $rows['sponser_id'];
    $parent_code = $rows['parent_code'];
    $created_at = $rows['created_at'];
  }
}
