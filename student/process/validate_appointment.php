<?php  

   include "../redo/includes/db_con.php";
   include "../redo/includes/date.php";
   include "../redo/functions/student_function.php";
   include "../redo/functions/function.php";
   include "../redo/functions/generate_qr.php";
   include "../redo/functions/service.php";
   include "../redo/functions/sendemail.php";

   session_start();

   $stud_id = $_SESSION['student_id'];

   $stud_logged = selStudentAcc($conn, $stud_id);

   $seID = $_POST['med_type'];

   // get service date id
   $dateID = $_POST['se_date'][0];

   $selDateID = "SELECT * FROM `appointment_dates` a
   JOIN `appointment` b
   ON a.app_id = b.app_id
   WHERE a.`app_id` = '$seID' AND a.`app_dates` = '$dateID' AND `app_status` = 1";

   $resDateID = mysqli_query($conn, $selDateID);

   // check if row is equal to 1
   if(mysqli_num_rows($resDateID) === 1){

      // fetch service date id base on date
      $serviceDate = mysqli_fetch_assoc($resDateID);

      $seDateID = $serviceDate['app_date_id'];
      $totalSlot = $serviceDate['app_slot'];
      $totalStud = $serviceDate['num_stud'];

      

      // generate ref id for appointment
      $ref_no = generateReferenceNo("APP", 14);

      // get images array
      $img_name = $_FILES['multiImg']['name'];
      $img_tmpName = $_FILES['multiImg']['tmp_name'];
      $img_error = $_FILES['multiImg']['error'];
      
      // set folder url where image/s is inserted
      $path = "../redo/appointment-images";
      
      

      // reason of appointment 
      $roa = $_POST['roa'];

      // check if first index in an image array is empty
      if(!empty($img_name[0])){

         // insert here if images is not equal to zero

         // iterate image array
         foreach ($img_name as $i => $name) {

            // move iterate image to folder that has been set in $path
            $imgName = moveImg($path, $name, $img_tmpName[$i], $img_error[$i], $curr_date);

            // insert iterate image to `stud_app_file` table
            insertAppImages($conn, $ref_no, $imgName);
         }
  
      }
      
      $tempDir = "../redo/app_qr/";    // set folder where to insert qr image
      $codeContents = $ref_no;         // value of qr image when scanned

      // generate qr for appointment 
      $qrName = generateQR($tempDir, $codeContents);


      $insertNewApp = insertNewAppointment($conn, $ref_no, $seDateID, $stud_id, $seID, $roa, $date_today, $qrName);

      if(!$insertNewApp) {
         
         echo mysqli_error($conn);

      } else {
         
         $formatDate = new DateTime($dateID);
         $formatDate = $formatDate->format("l, F d, Y");         

         $email = $stud_logged['email'];

         $title = "Quezon City University Clinic";

         $subject = $serviceDate['app_type']." Appointment Reference No.: $ref_no";

         $mess = "";

         $mess .= "<h3> Appointment Success </h3>";

         $mess .= "<p> Good day Mr/Ms, ".$stud_logged['lastname']."! </p> ";

         $mess .= "<p> Your request for <b> ".$serviceDate['app_type']." </b> appointment on <b> $formatDate from 7:00 AM to 5:00 PM </b> has been success. </p>";

         $mess .= "<p> Thanks, </p>";

         $mess .= "<p> QCU Clinic MS Team </p>";


         addStud($conn, $seID, $seDateID);
         sendEmail($email, $subject, $mess, $title);

         // echo "Appointment set success!";

      }

   }

?>