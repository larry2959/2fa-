<?php
global $con;
session_start();
include 'code/dbcon.php';

// Enable error reporting for debugging


if (isset($_GET['token'])) {
  $token = $_GET['token'];

  // Fetch the user based on the token
  $verify_query = "SELECT `verify token`, users.verify_status FROM iap.users WHERE `verify token` = '$token' LIMIT 1";
  $verify_query_run = mysqli_query($con, $verify_query);

  if (mysqli_num_rows($verify_query_run) > 0) {
    $row = mysqli_fetch_array($verify_query_run);

    if ($row['verify_status'] == 0) {
      // Update the user's verification status
      $update_query = "UPDATE users SET verify_status = '1' WHERE `verify token` = '$token' LIMIT 1";
      $update_query_run = mysqli_query($con, $update_query);

      if ($update_query_run) {
        $_SESSION['status'] = "Your account has been verified successfully";
        header("Location:login.php");
        exit(0);
      } else {
        $_SESSION['status'] = "Verification failed";
        header("Location:SignUp.php");
        exit(0);
      }
    } else {
      // User is already verified
      $_SESSION['status'] = "Email already verified, please login";
      header("Location:login.php");
      exit(0);
    }
  } else {
    $_SESSION['status'] = "This token does not exist";
    header("Location:SignUp.php");
    exit(0);
  }
} else {
  $_SESSION['status'] = "Not Allowed";
  header("Location:forms/index.php");
  exit(0);
}
?>
