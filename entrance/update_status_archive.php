<?php
   include "./connection.php";
   include "./function.php";
   include "./date.php";

   $stud_id = $_POST['stud_id'];
   $role = 'student';
   $campus = $_POST['campus'];

   $archive = archive($conn, $stud_id, $role,$campus ,$date_today, $time_today);

     if(!$archive){
      echo mysqli_error($conn);
   }
   else{
      include "./archive_tbl.php"; ?>

      <script> 

         $('.numerical').load('./total.php');
         
      </script>
   
   <?php }
?>
