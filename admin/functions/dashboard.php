<?php 

echo "<p>loading...</p>";

if($_GET['action'] == "approve"){

   $base_url = 'http://localhost:8080/updated-smrms';

// $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "clinicms_db");
   $conn = mysqli_connect("localhost", "root", "", "clinicms_db");

   $postID = $_GET["postID"];
   $status = $_GET["status"];

   $ins = "UPDATE `announce` SET `approve_status`='$status' WHERE `id`=$postID";
   $res = mysqli_query($conn, $ins);

//    echo "<script>console.log('Hello')</script>";

   header("location: ".$base_url."/admin/pages/dashboard.php");

//    return $res;
}

if($_GET['action'] == "decline"){

    $base_url = 'http://localhost:8080/updated-smrms';
   //  $base_url = 'https://qcu-smrms.site';
 
 // $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "clinicms_db");
    $conn = mysqli_connect("localhost", "root", "", "clinicms_db");
 
    $postID = $_GET["postID"];
    $status = $_GET["status"];
 
    $ins = "UPDATE `announce` SET `approve_status`='$status' WHERE `id`=$postID";
    $res = mysqli_query($conn, $ins);
 
 //    echo "<script>console.log('Hello')</script>";
 
    header("location: ".$base_url."/admin/pages/dashboard.php");
 
 //    return $res;
 }

 if($_GET['action'] == "revert"){

    $base_url = 'http://localhost:8080/updated-smrms';
 
 // $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "clinicms_db");
    $conn = mysqli_connect("localhost", "root", "", "clinicms_db");
 
    $postID = $_GET["postID"];
    $status = $_GET["status"];
 
    $ins = "UPDATE `announce` SET `approve_status`='$status' WHERE `id`=$postID";
    $res = mysqli_query($conn, $ins);
 
 //    echo "<script>console.log('Hello')</script>";
 
    header("location: ".$base_url."/admin/pages/dashboard.php");
 
 //    return $res;
 }



?>