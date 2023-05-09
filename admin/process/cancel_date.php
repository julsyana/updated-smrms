<?php 

   include "../includes/db_conn.php";
   include "../functions/appointment.php";
   include "../functions/sendemail.php";

   $date_id = $_POST['date_id'];
   $se_id = $_POST['se_id'];
   $reason = $_POST['reason'];

   $appRes = selApp($conn, $se_id);

   $sel = "SELECT * FROM `stud_appointment` a
   JOIN `appointment_dates` b
   ON a.app_date_id = b.app_date_id
   JOIN `mis.student_info` c
   ON a.student_id = c.student_id
   WHERE a.app_date_id = '$date_id' AND b.app_dates >= CURDATE() AND a.app_status = 'scheduled';";

   $students = mysqli_query($conn, $sel);

   // $students = selStudPerDate($conn, $date_id);


   if(mysqli_num_rows($students) > 0) { 

      while($student = mysqli_fetch_assoc($students)){

         $formatDate = $student['app_dates'];
         $formatDate = new DateTime($formatDate);
         $formatDate =  $formatDate->format("l, F d, Y");

         $title = "QCUC ".$appRes['app_type'];
         
         $subject = "Cancel Appointment";
         $mess = "";
         $mess .= "<p> Good day Mr/Ms. ".$student['lastname'].". </p>";
         $mess .= "<br>";
         $mess .= "<p> We would like to inform you, due to <b> $reason </b> your appointment from <b> ".$appRes['app_type']." Service</b> at <b> $formatDate </b> has been cancelled. ";
         
         $mess .= "<br>";
         $mess .= "<p> Thank you for your consideration! </p>";
         $mess .= "<br>";
         $mess .= "<p> From QCU Clinic Team. </p>";

         $stud_id = $student['student_id'];

         $upd = "UPDATE `stud_appointment` SET `app_status` = 'cancelled' 
         WHERE student_id = '$stud_id' AND se_id = '$se_id' AND app_status = 'scheduled'";

         $updRes = mysqli_query($conn, $upd);

         if($updRes){
            sendEmail($student['email'], $subject, $mess, $title);
         }
      }      

      $update = mysqli_query($conn, "UPDATE `appointment_dates` SET `app_status`= 0 WHERE `app_date_id` = '$date_id'");

      if($update){
         echo "Email Sent";
      }

   } else {

      $update = mysqli_query($conn, "UPDATE `appointment_dates` SET `app_status`= 0 WHERE `app_date_id` = '$date_id'");

      if($update){
         echo "Appointment cancelled";
      }

   }

?>