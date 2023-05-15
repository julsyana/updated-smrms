<?php 

   include "../includes/db_conn.php";

   $ref_no = $_POST['ref_no'];

   $upd = mysqli_query($conn1, "UPDATE `consultations` SET `status`='cleared' WHERE `reference_no` = '$ref_no'");


   if($upd){

      $sel = mysqli_query($conn1, "SELECT * FROM `consultations` WHERE `reference_no` = '$ref_no'");

      $res = mysqli_fetch_assoc($sel);
      
      $studID = $res['student_id'];

      mysqli_query($conn1, "UPDATE `sample_stud_data` SET `Status` = 'cleared' WHERE `student_id` = '$studID'");
      ?>

      <script>
         window.location.href = "./information.php?stud-id=<?=$studID?>";
      </script>
      <?php 

   }

?>