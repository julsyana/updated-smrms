<?php

   include "../../includes/db_con.php";

   $seID = $_POST['se_id'];
   $dateID = $_POST['date_id'];

   // count all dates base on service id
   $selSeDates = "SELECT COUNT(*) as `total_number` FROM `appointment_dates` a 
   JOIN `appointment` b
   ON a.app_id = b.app_id
   WHERE a.app_id = '$seID' AND a.app_status = 1";


   // fetch number of slot base on service id and date selected
   $selDateSlot = "SELECT * FROM `appointment_dates` WHERE `app_id` = '$seID' AND `app_dates` = '$dateID'";

   // query for number of slots
   $resDateSlot = mysqli_query($conn, $selDateSlot);

   // query for number of dates based on service
   $resSeDates = mysqli_query($conn, $selSeDates);
   // fetch data
   $numberOfDates = mysqli_fetch_assoc($resSeDates);


   if($numberOfDates['total_number'] > 0){

      if(mysqli_num_rows($resDateSlot) === 1){
      
         $slotDate = mysqli_fetch_assoc($resDateSlot);
   
      ?>
         <p> Slots: <span> <?=($slotDate['app_slot'] - $slotDate['num_stud'])?> </span> </p>
      <?php 

      } else { 
         
      ?>
         <p> Slots: <span> Select Date </span> </p>

      <?php 
   
   }
   

   } else {

   ?>
      <p> </p>
   <?php 

   }



   


   
?>


