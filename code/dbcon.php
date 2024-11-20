<?php
$con = mysqli_connect('localhost', 'root', '', 'assign');

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected successfully to the database";
}
?>
