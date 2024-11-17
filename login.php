<?php
$page_title = 'login form';
include('forms/header.php');
include('forms/navbar.php');
?>

  <div class = 'py-5'>
    <div class="container">
      <div class = "row justify-content-centre">
        <div class="row">
          <div class = 'col-md-8'>
            <div class = 'card'>
              <div class="card-header">
                <h5>Login Form </h5>
              </div>
              <div class = 'card-body'>
                <form action="">
                  <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" name = "name " class = "form-control">

                  </div>


                  <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" name = "password" class = "form-control">

                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn-btn-danger">Log In</button>
                  </div>
                </form>

              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>

<?php include('forms/footer.php');

