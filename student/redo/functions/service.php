<?php

function selAllServices($conn){

   $sel = "SELECT * FROM `appointment` WHERE `status` = 1";

   $result = mysqli_query($conn, $sel);

   return $result;
}

function addStud($conn, $seID, $seDateID){

   $upd = "UPDATE `appointment_dates` 
   SET `num_stud`= `num_stud` + 1
   WHERE `app_id` = '$seID' AND `app_date_id` = '$seDateID' AND `app_status` = 1";

   $res = mysqli_query($conn, $upd);

   return $res;

}



?>