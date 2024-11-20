<?php
session_start(); // Start the session
require 'vendor/autoload.php';
include 'code/dbcon.php';

function sendEmailVerify($name, $email, $verify_token) {
  $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'larrilavin@gmail.com'; // Your email credentials
    $mail->Password = 'Larryinit@2959';       // Your app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipient and sender details
    $mail->setFrom('larrilavin@gmail.com', 'SYSTEM MAC O');
    $mail->addAddress($email);
    $mail->isHTML(true); // Set email format to HTML

    // Email content
    $mail->Subject = "Verify Your Email - Health Mate";
    $mail->Body = "
      <h2>Welcome to SYSTEM MAC O, $name!</h2>
      <p>Thank you for registering. Please click the link below to verify your email address:</p>
      <a href='http://localhost/healthmate/verify.php?token=$verify_token'>Verify Email</a>
    ";

    $mail->send();
  } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT); // Secure password hashing
  $verify_token = md5(rand()); // Generate a unique token

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status'] = "Invalid email format";
    header("Location: SignUp.php");
    exit();
  }

  // Check if email already exists
  $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
  $check_email_query_run = mysqli_query($con, $check_email_query);

  if (mysqli_num_rows($check_email_query_run) > 0) {
    $_SESSION['status'] = "Email ID already exists.";
    header("Location: SignUp.php");
    exit();
  } else {
    // Insert user data
    $query = "INSERT INTO users (username, email, password, verify_token, is_verified)
              VALUES ('$name', '$email', '$password', '$verify_token', 0)";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
      sendEmailVerify($name, $email, $verify_token);
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
