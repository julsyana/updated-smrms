<?php

function selNurse($conn, $nurse_id){
   $sel = "SELECT * FROM `nurses` WHERE `emp_id` = '$nurse_id';";

   $res_query = mysqli_query($conn, $sel);
   
   $result = mysqli_fetch_assoc($res_query);

   return $result;
}

?>