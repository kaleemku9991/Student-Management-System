<?php 

include 'dbconnect.php';
if(isset($_GET['delete_teacher'])){
  $delete=$_GET['delete_teacher'];
  $query="select * from teacher_detail where t_id ='$delete'";
  $rs=mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($rs)){
    $image=$row['photo'];
  }
  unlink('student_image/'.$image);

  $sql="delete from teacher_detail where t_id ='$delete'";
  $run=mysqli_query($conn,$sql);
  if($run){
    echo "<script>window.open('veiw_teacher.php?delete_msg=Data deleted successfully','_self')</script>";
  }

}


?>