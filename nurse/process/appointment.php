<?php 

   include("../includes/db_conn.php");

   $ref_no = $_POST['ref_no'];

   $info = "UPDATE `stud_appointment` SET app_status = 'attended' where  reference_no = '$ref_no'";
    
   $run_query = mysqli_query($conn1,$info) or die(mysqli_error($conn1));

?>