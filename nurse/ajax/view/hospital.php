<?php 
   
   include("../../includes/db_conn.php");
   error_reporting(0);

   $hospiID = $_POST['hospi_id'];

   $query = mysqli_query($conn1, "SELECT * FROM `hospitals` WHERE `hospi_id` = '$hospiID'");

   $hospital = mysqli_fetch_assoc($query);

   echo $hospital['hospital_add'];




?>