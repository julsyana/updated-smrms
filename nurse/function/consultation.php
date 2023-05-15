<?php

function insertConsultation($conn, $refNo, $studID, $empID, $dateConsult, $symptoms, $injuries, $bodyTemp, $systolic, $diastolic, $isSuspected, $isTested, $isConfined,$howLong, $isReferred, $hospital, $hosAddress, $isCleared){
   $ins = "INSERT INTO `consultations`
   (`reference_no`, `student_id`, `emp_id`, `date_of_consultation`, `symptoms`, `injuries`, `body_temp`, `bp_systolic`, `bp_diastolic`, `suspected_covid`, `tested_covid`, `confined`, `how_long`, `referred`, `hospital`, `hospital_add`, `status`) 
   VALUES 
   ('$refNo', '$studID', '$empID','$dateConsult', '$symptoms','$injuries','$bodyTemp', '$systolic', '$diastolic', '$isSuspected','$isTested','$isConfined','$howLong','$isReferred','$hospital','$hosAddress', '$isCleared')";

   $res = mysqli_query($conn, $ins);

   return $res;
}


?>