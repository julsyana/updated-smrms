<?php

   include_once("../includes/db_conn.php");

   $type = $_POST['set_type'];
   $criticalLevel = $_POST['critical_level'];

   $ins = "INSERT INTO `critical_level`
   (`stock_expDate`, `type`, `date_created`)
   VALUES 
   ($criticalLevel, '$type', NOW())";

   $result = mysqli_query($conn, $ins);

   if($result){
      echo "Redirecting in 5 secs...";
   } else {
      echo mysqli_error($conn);
   }

?>