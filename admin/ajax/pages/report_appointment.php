<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";
   include "../../includes/date.php";

   $range = $_POST['range'];

   $query = "SELECT *, LEFT(b.middlename, 1) as `mi` FROM `stud_appointment` a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   JOIN `appointment_dates` d
   ON a.app_date_id = d.app_date_id
   JOIN `appointment` e
   ON a.se_id = e.app_id
   WHERE a.app_status = 'attended'";

   switch ($range){
      case "monthly": {

         $fromDate = date('Y-m-d', strtotime('-30 days'));
         $today = date("Y-m-d");

         $query .= " AND DATE(d.app_dates) BETWEEN '$fromDate' AND '$today'";
         break;
      }

      case "yearly": {
         $fromDate = date('Y-m-d', strtotime('-365 days'));
         $today = date("Y-m-d");

         $query .= " AND DATE(d.app_dates) BETWEEN '$fromDate' AND '$today'";
         break;
      }
   }

   $query .= " ORDER BY a.id DESC";

   $stud_app = mysqli_query($conn, $query);

?>
               
<div class="report-box">

   <div class="report-header">
   <h2 style="text-transform:capitalize"> <?=$range?> Appointments report </h2>
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
               <th> Appointment type </th>
               <th> Date of Appointments </th>
               <th> Campus </th>
               <th> Date Created </th>
            </tr>
         </thead>

         <tbody>
            <?php 
               if(mysqli_num_rows($stud_app) > 0){
                  $count = 1;
                  while($row = mysqli_fetch_assoc($stud_app)){

                     $app_dates = $row['app_dates'];
                     $app_dates = new DateTime($app_dates);
                     $app_dates = $app_dates->format("F d, Y");

                     $dateApply = $row['date_apply'];
                     $dateApply = new DateTime($dateApply);
                     $dateApply = $dateApply->format("F d, Y");

                     ?>
                     
                        <tr> 
                           <td> <?=$count?></td>
                           <td> <?=$row['lastname']?>, <?=$row['firstname']?> <?=$row['mi']?>.  </td>
                           <td> <?=$row['gender']?> </td>
                           <td> <?=$row['code']?> </td>
                           <td> <?=$row['section']?> </td>
                           <td> <?=$row['app_type']?> Service </td>
                         
                           <td> <?=$app_dates?> </td>
                          
                         
                           <td> <?=$row['branch']?> </td>
                           <td> <?=$dateApply?> </td>
                          
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
      window.open('../print_details.php?type=appointment&range=<?=$range?>', '_blank');
   });
</script>
