<?php

   include "../../includes/db_con.php";
   session_start();
   error_reporting(0);

   $stud_id = $_SESSION['student_id'];

   $seID = $_POST['se_id'];

   $selSeDates = "SELECT * FROM `appointment_dates` a 
   JOIN `appointment` b
   ON a.app_id = b.app_id
   WHERE a.app_id = '$seID' AND a.app_status = 1";

   $resSeDates = mysqli_query($conn, $selSeDates);


   $existDate = array();


   if(mysqli_num_rows($resSeDates) > 0){

      while($row = mysqli_fetch_assoc($resSeDates)) {

         $app_date_id =  $row['app_date_id'];

         $check = "SELECT * FROM `stud_appointment` a, `appointment_dates` b
         WHERE  a.app_date_id = b.app_date_id AND a.`app_date_id` = '$app_date_id' AND `student_id` = '$stud_id';";

         $verify = mysqli_query($conn, $check);

         if(mysqli_num_rows($verify) === 1) {

            $existed = mysqli_fetch_assoc($verify)['app_dates'];

         }

         if($row['app_slot'] != $row['num_stud']){

            if($row['app_dates'] != $existed){

               $existDate[] = $row['app_dates'];
            }
            
         }
      }
   }


   if(!empty($existDate)){
      ?>
         <input type="text" id="se-dates" name="se_date[]" class="se-dates" placeholder="Select Date" data-se_id="<?=$seID?>" required>
      <?php

   } else {

      ?>
         <input type="text" id="se-dates" name="se_date[]" class="se-dates" placeholder="No available dates" data-se_id="<?=$seID?>" disabled>
      <?php

   }

?>
   

<script>

   $(document).ready(function(){

      let date_id = $('#se-dates').val();
      let se_id = $('#se-dates').data('se_id');

      $('#set-slot').load('../ajax/view/service_slot.php', {
         se_id: se_id, 
         date_id, date_id
      });


      $('#se-dates').change(function(){

         let date_id = $(this).val();
         let se_id = $(this).data('se_id');


         $('#set-slot').load('../ajax/view/service_slot.php', {
            se_id: se_id, 
            date_id: date_id
         });
         
      });

   });
   
   var existingDates = <?=json_encode($existDate)?>

   flatpickr(".se-dates", {
      altInput: true,
      altFormat: "l, F d, Y",
      dateFormat: "Y-m-d",
      minDate: "today",
      // inline: true,
      enable: existingDates,

   });

</script>
