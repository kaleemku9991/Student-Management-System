<?php
// include 'dbconnect.php';
// session_start();
// if(!$_SESSION['email']){
//     $_SESSION['login_first']="Please Login First";
//     header('Location:index.php');
// }
?>


<!-- html registeration/login form -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/0e62a5467e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>sms</title>
  <script>
    jQuery(document).ready(function($) {
      $('#toggler').click(function(event) {
        {
          event.preventDefault();
          $('#wrap').toggleClass('toggled')
        }
      });
    });
  </script>
</head>

<body>
  <!-- bootstrap sidebar -->
  <div class="d-flex" id="wrap">
    <div class="sidebar bg-light border-light" id="sidebar">
      <div class="sidebar-heading" id="sidebar-heading">
        <p class="text-center">Manage Students</p>
      </div>
      <ul class="list-group list-group-flush">
        <a href="main.php" class="list-group-item list-group-item-action">
          <i class="fa fa-vcard-o"></i>Dashboard
        </a>
        <a href="add_teacher.php" class="list-group-item list-group-item-action">
          <i class="fa fa-user"></i>Add Teacher
        </a>
        <a href="veiw_teacher.php" class="list-group-item list-group-item-action">
          <i class="fa fa-eye"></i>View Teacher
        </a>
        <a href="edit_teacher_detail.php" class="list-group-item list-group-item-action">
          <i class="fa fa-pencil"></i>Edit Teacher
        </a>
        <a href="add_student.php" class="list-group-item list-group-item-action">
          <i class="fa fa-user"></i>Add student
        </a>
        <a href="veiw_student.php" class="list-group-item list-group-item-action">
          <i class="fa fa-eye"></i>View Student
        </a>
        <a href="edit_student_detail.php" class="list-group-item list-group-item-action">
          <i class="fa fa-pencil"></i>Edit Student
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action">
          <i class="fa fa-sign-out"></i>Logout
        </a>
      </ul>
    </div>

    <div class="main-body">
      <button class="btn btn-outline-light bg-danger" id="toggler">
        <i class="fa fa-bars"></i>
      </button>
      <section id="main-form">
        <h2 class="text-center text-primary pt-3 font-weight-bold">Student Management System</h2>
        <div class="container bg-primary" id="formatsetting">

          <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Welcome To Dashboard</h3>
          <div class="row">
            <div class="col-md-4 col-sm-4 col-12 m-auto icon">
              <a href="add_student.php" class="text-white text-center"><i class="fa fa-user"></i>
              <h3>Add Student detail</h3></a>
            </div>

            <div class="col-md-4 col-sm-4 col-12 m-auto icon">
              <a href="veiw_student.php" class="text-white text-center"><i class="fa fa-pencil"></i>
              <h3>Veiw Student detail</h3></a>
            </div>

            <div class="col-md-4 col-sm-4 col-12 m-auto icon">
              <a href="edit_student_detail.php" class="text-white text-center"><i class="fa fa-eye"></i>
              <h3>Edit Student detail</h3></a>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-4 col-sm-4 col-12 m-auto icon">
              <a href="add_teacher.php" class="text-white text-center"><i class="fa fa-user"></i>
              <h3>Add Teacher detail</h3></a>
            </div>

            <div class="col-md-4 col-sm-4 col-12 m-auto icon">
              <a href="veiw_teacher.php" class="text-white text-center"><i class="fa fa-pencil"></i>
              <h3>Veiw Teacher detail</h3></a>
            </div>

            <div class="col-md-4 col-sm-4 col-12 m-auto icon">
              <a href="edit_teacher_detail.php" class="text-white text-center"><i class="fa fa-eye"></i>
              <h3>Edit Teacher detail</h3></a>
            </div>
          </div>

        </div>


      </section>
    </div>
  </div>


</body>

</html>