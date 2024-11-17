<?php

session_start(); // Start the session
global $con;
require 'vendor/autoload.php';
include 'code/dbcon.php';

function sendEmailVerify($name, $email, $verify_token) {
  global $con;

  $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ayanaamwayi@gmail.com';
    $mail->Password = 'lyecjwusyrhusadf';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('ayanaamwayi@gmail.com', 'Mailer');
    $mail->addAddress($email);
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = "Email verification from IAP_ASS.2";
    $mail->Body = "Verification of your email. Click the link to verify: <a href='http://localhost/IAP_ASS.2/login.php'>Verify Email</a>";

    $mail->send();
    echo 'Message sent';
  } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT); // Secure password hashing
  $verify_code = md5(rand());

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
  }

  // Check if email exists
  $check_email_query = "SELECT email FROM iap.users WHERE email ='$email' LIMIT 1";
  $check_email_query_run = mysqli_query($con, $check_email_query);

  if (mysqli_num_rows($check_email_query_run) > 0) {
    $_SESSION['status'] = "Email id already exists";
    header("Location: SignUp.php");
    exit();
  } else {
    // Insert user data
    $query = "INSERT INTO iap.users (username, email, password , `verify token`) VALUES ('$name', '$email', '$password', '$verify_code')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
      sendEmailVerify($name, $email, $verify_code);
      $_SESSION['status'] = "Registration Successful. Please check your email to verify.";
      header("Location: SignUp.php");
      exit();
    } else {
      $_SESSION['status'] = "Registration failed. Please try again.";
      header("Location: SignUp.php");
      exit();
    }
  }
}
?>

<!-- HTML form for user registration -->
