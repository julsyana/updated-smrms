<?php 

   include("../includes/db_conn.php");
   session_start();

   $nurse_id = $_SESSION['emp_id'];
   $ref_no = $_POST['ref_no'];

   $info = "UPDATE `stud_appointment` SET app_status = 'attended', `processed_by` = '$nurse_id' WHERE  reference_no = '$ref_no'";   
   $run_query = mysqli_query($conn1,$info) or die(mysqli_error($conn1));

?>