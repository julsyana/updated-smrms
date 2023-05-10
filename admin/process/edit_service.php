<?php 

   include "../includes/db_conn.php";
   include "../functions/appointment.php";
   include "../functions/sendemail.php";
   include "../includes/date.php";

   $app_id = $_POST['app_id'];
   $app_status = $_POST['app_status'];


   $appRes = selApp($conn, $app_id);

   $allStudentsPerService = selStudPerService($conn, $app_id);
   $time = date("h:i A");


   if(mysqli_num_rows($allStudentsPerService) > 0){
      
      while($student = mysqli_fetch_assoc($allStudentsPerService)){

         $stud_id = $student['student_id'];

         $sel = "SELECT * FROM `stud_appointment` a
         JOIN `appointment_dates` b
         ON a.app_date_id = b.app_date_id
         WHERE a.se_id = '$app_id' AND a.student_id = '$stud_id' AND b.app_dates >= CURDATE() ";

         

         $mess = "";

         if($app_status == 0) {

            $sel .= "AND a.app_status = 'scheduled';";

            $res = mysqli_query($conn, $sel);

            $title = "QCUC ".$appRes['app_type'];

            $subject = $appRes['app_type']." service is currently not available";

            $mess .= "<p> Good day Mr/Ms. ".$student['lastname'].". </p>";
            $mess .= "<br>";
            $mess .= "<p> We would like to inform you, that your remaining appointments from <b> ".$appRes['app_type']."</b> is <span style='color: var(--alertBgButton)'> cancelled </span>. </p>";

            $mess .= "<p> <b> List of date(s) that has not been attended: </b> </p>";

            if(mysqli_num_rows($res) > 0 && !($time > '07:00 AM' AND $time < '05:00 PM')){

              while($dates = mysqli_fetch_assoc($res)){

                  $formatted = $dates['app_dates'];
                  $formatted = new DateTime($formatted);
                  $formatted = $formatted->format("F d, Y");

                  $mess .= "<p> ".$formatted." </p>";
              }

            }

            $mess .= "<br>";
            $mess .= "<p> Thank you for your consideration! </p>";
            $mess .= "<br>";
            $mess .= "<p> From QCU Clinic Team. </p>";

            $status = "cancelled";

            $prevStats = 'scheduled';

           
         } else {

            $sel .= "AND a.app_status = 'cancelled';";

            $res = mysqli_query($conn, $sel);

            $title = "QCUC ".$appRes['app_type'];

            $subject = $appRes['app_type']." service is BACK!";

            $mess .= "<p> Good day Mr/Ms. ".$student['lastname'].". </p>";

            $mess .= "<br>";

            $mess .= "<p> We would like to inform you that this service <b> ".$appRes['app_type']."</b> is <span style='color: #000'> BACK </span>. </p>";

            $mess .= "<p> Also, your remaining appointment that was cancelled is now <span style='color: var(--successBgButton)'> available  </span>. </p>";
            
            $mess .= "<p> <b> List of remaining date(s) that was cancelled </b> </p>";

            if(mysqli_num_rows($res) > 0 && !($time > '07:00 AM' AND $time < '05:00 PM')){
              while($dates = mysqli_fetch_assoc($res)){

                  $formatted = $dates['app_dates'];
                  $formatted = new DateTime($formatted);
                  $formatted = $formatted->format("F d, Y");

                  $mess .= "<p> ".$formatted." </p>";
              }
            }

            $mess .= "<br>";
            $mess .= "<p> Thank you for your consideration! </p>";
            $mess .= "<p> From QCU Clinic Team. </p>";

            $status = "scheduled";

            $prevStats = 'cancelled';

         }

         $email = $student['email'];
         
         // sendEmail($email, $subject, $mess, $title);

         $upd = "UPDATE `stud_appointment` SET `app_status`= '$status' 
         WHERE student_id = '$stud_id' AND se_id = '$app_id' AND app_status = '$prevStats'";


         $updAppointmentStatus = mysqli_query($conn, "UPDATE `appointment` SET `status`= $app_status WHERE app_id = '$app_id'");

         if($updAppointmentStatus){

            $update = mysqli_query($conn, $upd);
            sendEmail($email, $subject, $mess, $title);

         } else {

            echo mysqli_error($conn);

         }

      }

   } else {

      $updAppointmentStatus = mysqli_query($conn, "UPDATE `appointment` SET `status`= $app_status WHERE app_id = '$app_id'");

      $update = mysqli_query($conn, $updAppointmentStatus);

   }

?>