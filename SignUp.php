<?php
session_start();
$page_title = 'SignUp.php';
include('forms/header.php');
include('forms/navbar.php');
?>

  <div class='py-5'>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">

          <div class='card'>
            <div class="card-header">
              <h5>Registration Form</h5>
            </div>
            <div class='card-body'>
              <div class="alert">
                <?php
                if(isset($_SESSION['status'])){
                  echo '<h4>'.$_SESSION['status'].'</h4>';
                  unset($_SESSION['status']);
                }
                ?>

              <form action="code.php" method="post">
                <div class="form-group mb-3">
                  <label for="">Name</label>
                  <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label for="">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label for="">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">Register Now</button>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>


