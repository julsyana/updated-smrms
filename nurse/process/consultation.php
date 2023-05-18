<?php
   session_start();
   include('../includes/db_conn.php');
   include('../function/function.php');
   include('../function/consultation.php');
   include('../includes/date.php');
   

   
   // generate ref id for consultation
   $ref_no = generateReferenceNo("CON", 14);
   
   // employee/nurse id
   $emp_id = $_SESSION['emp_id'];

   // student id
   $stud_id = $_POST['stud_id'];
   
   $nurseInfo = mysqli_query($conn1, "SELECT * FROM `nurses` WHERE `emp_id` = '$emp_id'");
   $nurse = mysqli_fetch_assoc($nurseInfo);
   
   echo $nurseCampus = $nurse['campus'];

   // symptoms
   if(empty($_POST['symptoms'][0])){

      $symptoms = "None";

   } else {

      $symptoms = $_POST['symptoms'];
      $symptoms = implode(", ", $symptoms);

   }

   // body temperature
   $bodyTemp = $_POST['body_temp'];

   // blood pressure
   $bp_systolic = $_POST['systolic'];
   $bp_diastolic = $_POST['diastolic'];

   // close contant to covid
   $isSuspected = $_POST['close_contact'];

   // have been tested for covid past 10 days
   $isTested = $_POST['covid_test'];

   // injuries
   if(empty( $_POST['injuries'][0])){

      $injuries = "None";

   } else {

      $injuries = $_POST['injuries'];

      $injuries = implode(", ", $injuries);

   }

   // confined?
   $isConfined = $_POST['confined'];

   // if confined assign value on howlonng
   if($isConfined == 'no'){

      $howLong = 0;

   } else {

      $howLong = $_POST['how_long'];
   }
  

   // referred to any hospital?
   $isReferred = $_POST['referred'];

   // if referred assign value on hospital
   if($isReferred == 'yes'){

      $hosID = $_POST['hospital'];
      $query = mysqli_query($conn1, "SELECT * FROM `hospitals` WHERE `hospi_id` = '$hosID'");
      
      $hospital = mysqli_fetch_assoc($query);

      $hospitalName = $hospital['hospital'];
      $hospitalAdd = $hospital['hospital_add'];

   } else {

      $hospitalName = "None";
      $hospitalAdd = "None";

   }
   
   
  

   $isCleared = $_POST['cleared'];

  $insert = insertConsultation($conn1, $ref_no, $stud_id, $emp_id, $date_today, $symptoms, $injuries, $bodyTemp, $bp_systolic, $bp_diastolic, $isSuspected, $isTested, $isConfined, $howLong, $isReferred, $hospitalName, $hospitalAdd, $isCleared);

  if($insert){

      if(!empty($_POST['medicine'][0])){

         $medicine = $_POST['medicine'];
         $med_slot = $_POST['med_slot'];
   
         foreach ($medicine as $key => $value) {
             
            mysqli_query($conn1, "UPDATE `medicine` SET `med_used`= (`med_used` + $med_slot[$key]) WHERE `name` LIKE '$value' AND `campus` = '$nurseCampus'");
            mysqli_query($conn1, "INSERT INTO `consultations_med`(`ref_no`, `medicine`, `quantity`) VALUES ('$ref_no','$value','$med_slot[$key]')");
            
         }
   
      }

      if($isCleared == 'cleared') {
         
         ?>
         
         <script>

            window.location.href = "./information.php?stud-id=<?=$stud_id?>";
            
         </script>
         
         <?php 

        

      } else {

         ?>
         
         <script>
            window.location.href = "./information.php?stud-id=<?=$stud_id?>";
         </script>
         
         <?php 


      }


      mysqli_query($conn1, "UPDATE `sample_stud_data` SET `Status` = '$isCleared' WHERE `student_id` = '$stud_id'");

  }
   
   

?>