<?php

   include "../includes/db_conn.php";

   $slot = $_POST['slot'];
   $dateID = $_POST['dateID'];

   $addSlot = mysqli_query($conn, "UPDATE `appointment_dates` SET `app_slot` = `app_slot` + $slot WHERE `app_date_id` = '$dateID'");

   if($addSlot){
      echo "success";
   } else {
      echo "Something's wrong";
   }

?>