<?php
   
   include "../includes/db_conn.php";
   include "../includes/date.php";
   include "../functions/appointment.php";

   $seID = $_POST['se-id'];
   $seSlot = $_POST['se_slot'];

   $seDates = $_POST['se_dates'];
   $dates = explode(', ', $seDates);

   try {
      
      foreach ($dates as $key => $value) {

         $appDateID = "DATE".generateAppID(8);
   
         insAppSched($conn, $seID, $appDateID, $value, $seSlot, $date_today);
      }
      
   } catch (\Throwable $th) {

      echo mysqli_error($conn);

   }

   
   
?>