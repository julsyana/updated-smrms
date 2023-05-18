<?php 
session_start();

include_once("./connection.php");

$gemp_id = $_SESSION['gemp_id'];

$updStatus = "UPDATE `guard_status` SET `isLogged`= 0 WHERE `emp_id` = '$gemp_id'";

$updResult = mysqli_query($conn, $updStatus);


if($updResult){
   
   unset($_SESSION['gemp_id']);
   header("Location: ../admin/index.php");
}




