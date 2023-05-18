<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";
   include "../../includes/date.php";

   $rangeStart = $_POST['start'];
   $rangeEnd = $_POST['end'];

   $query = "SELECT *, LEFT(b.middlename, 1) as mi, b.firstname as s_fname, b.lastname as s_lname, b.gender as s_gender FROM consultations a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   JOIN nurses d
   ON a.emp_id = d.emp_id
   WHERE DATE(a.date_of_consultation) BETWEEN '$rangeStart' AND '$rangeEnd'
   ORDER BY a.date_of_consultation DESC";

   // switch ($range){
   //    case "monthly": {

   //       $fromDate = date('Y-m-d', strtotime('-30 days'));
   //       $today = date("Y-m-d");

   //       $query .= " AND DATE(a.date_of_consultation) BETWEEN '$range' AND '$range'";
   //       break;
   //    }

   //    case "yearly": {
   //       $fromDate = date('Y-m-d', strtotime('-365 days'));
   //       $today = date("Y-m-d");

   //       $query .= " AND DATE(a.date_of_consultation) BETWEEN '$fromDate' AND '$today'";
   //       break;
   //    }
   // }

   // $query .= " ";
   
   $stud_app = mysqli_query($conn, $query);

   
   
   function formatDate($date, $format){
      $date = new DateTime($date);
      $date = $date->format("$format");

      return $date;
   }

  

?>
<div class="report-box">

   <div class="report-header">
      <h2 style="text-transform:capitalize"> Students consultation report </h2>
      <p> 
         
         <?php 
      
            if($rangeStart == $rangeEnd){

               $range = $rangeStart;

               ?> From <?=formatDate($range, "F d, Y");?> <?php 

            } else {
               ?> from <b><?=formatDate($rangeStart, "F d, Y");?></b> to <b><?=formatDate($rangeEnd, "F d, Y");?></b> <?php 
            }
         ?>
      </p>
   </div>

   <div class="list-of-data-tbl" id="divToPrint">
      
      <table border="0">
         <thead>
            <tr> 
               <th> No. </th>
               <th> Student Name </th>
               <th> Gender </th>
               <th> Course </th>
               <th> Section </th>
               <th width="15%"> Patient's Complain </th>
               <th width="5%"> Medicine Given <br> (Name - Qty)</th>
               <th> Nurse Assisted </th>
               <th> Campus </th>
               <th> Date of Consultation </th>
            </tr>
         </thead>

         <tbody>
            <?php 
               if(mysqli_num_rows($stud_app) > 0){
                  $count = 1;
                  while($row = mysqli_fetch_assoc($stud_app)){

                     $date_consult = $row['date_of_consultation'];
                     $date_consult = new DateTime($date_consult);
                     $date_consult = $date_consult->format("F d, Y");
                     
                    $refNo = $row['reference_no'];
                    $med = mysqli_query($conn, "SELECT * FROM `consultations_med` WHERE `ref_no` = '$refNo'")

                     ?>
                     
                        <tr> 
                           <td> <?=$count?> </td>
                           <td> <?=$row['s_lname']?>, <?=$row['s_fname']?> <?=$row['mi']?>.  </td>
                           <td> <?=$row['s_gender']?> </td>
                           <td> <?=$row['code']?> </td>
                           <td> <?=$row['section']?> </td>
                           <td> <?=$row['symptoms']?></td>
                           
                           <td>
                               
                                <?php 
                                if(mysqli_num_rows($med) > 0){
                                    while($mrow = mysqli_fetch_assoc($med)){
                                        
                                        ?>
                                            <?=$mrow['medicine']?> - <?=$mrow['quantity']?> <br>
                                        <?php 
                                        
                                    }
                                    
                                } else {
                                    echo "No medicine given";
                                }
                            
                                ?>
                            
                               
                           </td>
                       
                           <td> <?=$row['firstname']?> <?=$row['lastname']?>, RN </td>
                           <td> <?=$row['branch']?> </td>
                           <td> <?=$date_consult?> </td>
                        </tr>
                     
                     
                     <?php
                     $count++;


                  }

               } else {

               }
            ?>
            
         </tbody>
      </table>
   </div>



</div>

<div class="form-button">
   <button id="printAppointment"> <i class="fas fa-print"></i> Print </button> 
</div>

               


<script>
   $('#printAppointment').click(function(){
      // window.location.href("../print_details.php?type=appointment", '_blank');
      window.open('../print_details.php?type=consultation&start=<?=$rangeStart?>&end=<?=$rangeEnd?>', '_blank');
   });
</script>