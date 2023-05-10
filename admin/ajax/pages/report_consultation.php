<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";
   include "../../includes/date.php";

   $range = $_POST['range'];

   $query = "SELECT *, LEFT(b.middlename, 1) as mi, b.firstname as s_fname, b.lastname as s_lname, b.gender as s_gender FROM consultations a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   JOIN nurses d
   ON a.emp_id = d.emp_id";

   switch ($range){
      case "monthly": {

         $fromDate = date('Y-m-d', strtotime('-30 days'));
         $today = date("Y-m-d");

         $query .= " AND DATE(a.date_of_consultation) BETWEEN '$fromDate' AND '$today'";
         break;
      }

      case "yearly": {
         $fromDate = date('Y-m-d', strtotime('-365 days'));
         $today = date("Y-m-d");

         $query .= " AND DATE(a.date_of_consultation) BETWEEN '$fromDate' AND '$today'";
         break;
      }
   }

   $query .= " ORDER BY a.date_of_consultation DESC";
   
   $stud_app = mysqli_query($conn, $query);

?>
<div class="report-box">

   <div class="report-header">
      <h2 style="text-transform:capitalize"> <?=$range?> Students consultation report </h2>
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
               <th> Patient's Complain </th>
               <th> Medicine Given </th>
               <th> Quantity </th>
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

                     ?>
                     
                        <tr> 
                           <td> <?=$count?> </td>
                           <td> <?=$row['s_lname']?>, <?=$row['s_fname']?> <?=$row['mi']?>.  </td>
                           <td> <?=$row['s_gender']?> </td>
                           <td> <?=$row['code']?> </td>
                           <td> <?=$row['section']?> </td>
                           <td> <?=$row['symptoms']?></td>
                           <td> <?=$row['medicine']?> </td>
                           <td> <?=$row['quantity']?> </td>
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
      window.open('../print_details.php?type=consultation&range=<?=$range?>', '_blank');
   });
</script>