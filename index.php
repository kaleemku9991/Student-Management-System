<!-- php code for registration  -->
<?php
// session_start();
include 'dbconnect.php';
$email_err = $pass_err = $success = $error = "";

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


  $query = "select * from register where email='$email'";
  $run = mysqli_query($conn, $query);
  $row = mysqli_num_rows($run);
  if ($row > 0) {
    $email_err = "Email id is already exists.please try with another email";
  } elseif ($password !== $cpassword) {
    $pass_err = "your password do not match";
  } else {
    $sql = "insert into register (fname,email,password,cpassword) values ('$fname','$email','$pass','$cpass')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
      $success = "Registerd successfully";
    } else {
      $error = "Unable to submit data. Please try again....";
    }
  }
}
?>

<!-- html registeration/login form -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>sms</title>
</head>

<body>

  <section>
    <h2 class="text-center text-warning font-weight-bold"><?php echo @$_SESSION['login_first']; ?></h2>
    <h2 class="text-center text-primary pt-2 font-weight-bold">Student Management System</h2>
    <p class="text-center font-weight-bold text-danger"><?php echo @$_GET['error'] ?></p>
    <div class="container bg-primary py-3 mb-5" id="formsetting">
      <h3 class="text-white text-center mb-3">Admin Login | Register Panel</h3>
      <div class="row">
        <div class="col-md-7 col-sm-7 col-12 text-center">
          <img src="images/stms.jpg" class="img-fluid mt-5">
        </div>
        <div class="col-md-5 col-sm-5 col-12 mt-4">
          <button class="btn btn-info px-5 mb-3" onclick="check()">Register</button>
          <button class="btn btn-info px-5 mb-3" onclick="check2()">Log In</button>

          <!-- registration -->
          <div id="div1" style="display: block;">
            <form method="POST" action="">
              <div class="form-group">
                <label class="text-white">Full Name</label>
                <input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label class="text-white">Email</label>
                <span class="float-right text-white font-weigth-bold"><?php echo $email_err; ?></span>
                <input type="email" name="email" placeholder="Enter your email" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label class="text-white">Password</label>
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label class="text-white">Confirm Password</label>
                <span class="float-right text-white font-weigth-bold"><?php echo $pass_err; ?></span>
                <input type="password" name="cpassword" placeholder="Enter your confirm password" class="form-control" required="required">
              </div>

              <input type="submit" name="submit" value="Register" class="btn btn-success px-5">
              <span class="float-right text-white font-weigth-bold"><?php echo $success;
                                                                    echo $error; ?></span>

            </form>
          </div>


          <!-- login -->
          <div id="div2" style="display: none;">
            <form method="POST" action="">
              <div class="form-group">
                <label class="text-white">Email</label>
                <input type="email" name="fname" placeholder="Enter your email" class="form-control">
              </div>

              <div class="form-group">
                <label class="text-white">Password</label>
                <input type="password" name="password" placeholder="Enter your password" class="form-control">
              </div>


              <input type="submit" name="submit1" value="Login" class="btn btn-success px-5">

            </form>
          </div>

        </div>

      </div>

    </div>
  </section>


  <script>
    function check() {
      document.getElementById("div1").style.display = "block";
      document.getElementById("div2").style.display = "none";
    }

    function check2() {
      document.getElementById("div1").style.display = "none";
      document.getElementById("div2").style.display = "block";
    }
  </script>
</body>

</html>


<!-- login page -->

<?php
if (isset($_POST['submit1'])) {
  $email = $_POST['email'];
  $pwd = $_POST['password'];
  $sql = "select * from register where email ='$email'";
  $run = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($run);

  $pwd_fetch = $row['password'];
  $pwd_decode = password_verify($pwd, $pwd_fetch);
  if ($pwd_decode) {
    echo "<script>window.open('main.php?success=loggedin successfully','_self')</script>";
  } else {
    echo "<script>window.open('index.php?error=username or password is incorrect','_self')</script>";
  }
};
?>