<?php 

function fetchAnnounce($conn){

   $sel = "SELECT * FROM `announce` WHERE `isArchive` = 0 ORDER BY `id` DESC";

   $qry = mysqli_query($conn, $sel);

   return $qry;

}

function fetchSelAnnounce($conn, $id){

   $sel = "SELECT * FROM `announce`
   WHERE `id` = '$id' AND `isArchive` = 0
   ORDER BY `id` DESC";

   $qry = mysqli_query($conn, $sel);

   return $qry;

}



echo "<p>loading...</p>";


//APPROVE POST
if($_GET['action'] == "approve"){

//   $base_url = 'http://localhost/updated-smrms';
   $base_url = 'https://qcu-smrms.site';

    $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");
//   $conn = mysqli_connect("localhost", "root", "", "clinicms_db");

   $postID = $_GET["postID"];
   $status = $_GET["status"];

   $ins = "UPDATE `announce` SET `approve_status`='$status' WHERE `id`=$postID";
   $res = mysqli_query($conn, $ins);

      //    echo "<script>console.log('Hello')</script>";

   header("location: ".$base_url."/admin/pages/dashboard.php");

      //    return $res;
}



//DECLINE POST
if($_GET['action'] == "decline"){

    // $base_url = 'http://localhost/updated-smrms';
     $base_url = 'https://qcu-smrms.site';
 
    $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");
    // $conn = mysqli_connect("localhost", "root", "", "clinicms_db");
 
    $postID = $_GET["postID"];
    $status = $_GET["status"];
 
    $ins = "UPDATE `announce` SET `approve_status`='$status' WHERE `id`=$postID";
    $res = mysqli_query($conn, $ins);
 
      //    echo "<script>console.log('Hello')</script>";
 
    header("location: ".$base_url."/admin/pages/dashboard.php");
 
      //    return $res;
 }



 //REVERT POST
 if($_GET['action'] == "revert"){

    // $base_url = 'http://localhost/updated-smrms';
    $base_url = 'https://qcu-smrms.site';
 
    $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");
    // $conn = mysqli_connect("localhost", "root", "", "clinicms_db");
 
    $postID = $_GET["postID"];
    $status = $_GET["status"];
 
    $ins = "UPDATE `announce` SET `approve_status`='$status' WHERE `id`=$postID";
    $res = mysqli_query($conn, $ins);
 
      //    echo "<script>console.log('Hello')</script>";
 
    header("location: ".$base_url."/admin/pages/dashboard.php");
 
      //    return $res;
 }



//DELETE POST
 if($_GET['action'] == "delete"){

//   $base_url = 'http://localhost/updated-smrms';
   $base_url = 'https://qcu-smrms.site';

    $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");
//   $conn = mysqli_connect("localhost", "root", "", "clinicms_db");

   $postID = $_GET["postID"];
   $status = $_GET["status"];

   date_default_timezone_set("Asia/Manila");
  
   $curr_date = date("Y-m-d");
   $curr_time = date("H:i:s");

   $date_today = "$curr_date $curr_time";

   $sel = "SELECT * FROM `announce` WHERE `id` = '$postID'";

   $sel_res = mysqli_query($conn, $sel);
   $announce = mysqli_fetch_assoc($sel_res);

   $name = $announce['announcement'];
   $arch_type = "announcement";
   $img = "";


   $ins = "INSERT INTO `archive`
   (`archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) 
   VALUES 
   ('$postID','$name','$arch_type','$date_today','$img')";

   $ins_res = mysqli_query($conn, $ins);

   if($ins_res){

      $del = "DELETE FROM `announce` WHERE `id` = '$postID'";
      $del_res = mysqli_query($conn, $del);

      header("location: ".$base_url."/admin/pages/dashboard.php");
   
   }


}



//EDIT POST
if($_GET['action'] == "edit"){

//   $base_url = 'http://localhost/updated-smrms';
   $base_url = 'https://qcu-smrms.site';

    $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");
//   $conn = mysqli_connect("localhost", "root", "", "clinicms_db");

   $postID = $_GET["postID"];
   $status = $_GET["status"];

   $announce = $_GET['announcement'];
   $curr_date = date("Y-m-d");
   $curr_time = date("H:i:s");


   $upd = "UPDATE `announce` SET 
   `announcement`='$announce',
   `date`='$curr_date',
   `time`='$curr_time',
   `approve_status`='$status' 
   WHERE `id` = '$hosID'";


    $res = mysqli_query($conn, $upd);
 
 
    header("location: ".$base_url."/admin/pages/dashboard.php");
 

 }
?>