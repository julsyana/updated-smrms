<?php


error_reporting(0);

session_start();

include('../../includes/db_conn.php');

$emp_id = $_SESSION['emp_id'];

$fetchNurseAccount = mysqli_query($conn1, "SELECT * FROM `nurses` WHERE emp_id = '$emp_id'");
$nurse = mysqli_fetch_assoc($fetchNurseAccount);

if($nurse['isArchive'] == 1){

   unset($_SESSION['emp_id']);

   echo "Logging out...";
   
   ?>
   <script>

      setInterval(window.location.href = "../index.php", 1000);

   </script>

   <?php 
   
} else {

   echo "Logout";

   ?>
   <script>

      // console.log('no logout');

   </script>

   <?php 
}



?>