<?php
include 'dbconnect.php';
// $fname = $lname = $email = $fathername = $birthdate = $gender = $city = $district = $nationality = $state = $mobile = $image = $image_type = $image_size = $image_tmp = "";
if (isset($_POST['add'])) {
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $fathername = mysqli_real_escape_string($conn, $_POST['fathername']);
  $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $district = mysqli_real_escape_string($conn, $_POST['district']);
  $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $image = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_tmp = $_FILES['image']['tmp_name'];

  if (!$image_type == 'image/jpg' or !$image_type == 'image/png') {
    $match_error = "Invalid image format";
  } else if ($image_size <= 2000) {
    $size_error = "Image size is larger. Image size should be less than 2mb";
  } else {
    move_uploaded_file($image_tmp, "student_image/$image");
    $sql = "insert into teacher_detail
  (fname,lname,father_name,email,mobile,birthdate,gender,district,city,state,nation,photo)
  values ('$fname','$lname','$fathername','$email','$mobile','$birthdate','$gender','$district','$city','$state','$nationality','$image')";

    $run = mysqli_query($conn, $sql);
    if ($run) {
      $success = "Teacher data submited successfully";
    } else {
      $error = "Unable to submit data. Please try again";
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
        <span class="text-center text-success font-weight-bold"><?php echo @$size_error;
                                                                echo @$match_error ?></span>
        <h2 class="text-center text-primary pt-3 font-weight-bold">Student Management System</h2>
        <div class="container bg-primary" id="formatsetting">

          <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Add Teacher Detail</h3>
          <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                  <label class="text-white">First Name </label>
                  <input type="text" name="fname" placeholder="Enter your first name" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">Email </label>
                  <input type="email" name="email" placeholder="Enter your Email" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">Father name</label>
                  <input type="text" name="fathername" placeholder="Enter your Father name" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">Gender</label>
                  <input type="radio" name="gender" value="male" class="form-check-input ml-2">
                  <label class="form-check-label pl-4 text-white">Male</label>
                  <input type="radio" name="gender" value="female" class="form-check-input ml-2">
                  <label class="form-check-label pl-4 text-white">Female</label>
                </div>

                <div class="form-group">
                  <label class="text-white">City</label>
                  <input type="text" name="city" placeholder="Enter your City" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">Nationality</label>
                  <input type="text" name="nationality" placeholder="Enter your Nationality" class="form-control" required="required">
                </div>
              </div>

              <div class="col-md-5 col-sm-6 col-12 m-auto">
                <div class="form-group">
                  <label class="text-white">Last Name </label>
                  <input type="text" name="lname" placeholder="Enter your last name" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">Birthdate </label>
                  <input type="date" name="birthdate" placeholder="Enter your Birthdate" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">Mobile</label>
                  <input type="text" name="mobile" placeholder="Enter your Mobile" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">District</label>
                  <input type="text" name="district" placeholder="Enter your District" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label class="text-white">State</label>
                  <input type="text" name="state" placeholder="Enter your State" class="form-control" required="required">
                </div>
                <div class="input-group">

                  <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                  </div>

                </div>
                <input type="submit" name="add" value="Add detail" class="btn btn-success px-5 mt-2">
                <span class="text-center text-success font-weight-bold"><?php echo @$success;
                                                                        echo @$error ?></span>
              </div>

            </div>
          </form>
        </div>
      </section>
    </div>
  </div>


</body>

</html>