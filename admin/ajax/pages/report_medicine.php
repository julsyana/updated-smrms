<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";
   include "../../includes/date.php";

   $range = $_POST['range'];

   $query = "SELECT DISTINCT(name), expirationDate, `date_added` FROM `medicine` WHERE";

   switch ($range){
      case "monthly": {

         $fromDate = date('Y-m-d', strtotime('-30 days'));
         $today = date("Y-m-d");

         $query .= " DATE(date_added) BETWEEN '$fromDate' AND '$today'";

         break;
      }

      case "yearly": {
         $fromDate = date('Y-m-d', strtotime('-365 days'));
         $today = date("Y-m-d");

         $query .= " DATE(date_added) BETWEEN '$fromDate' AND '$today'";
         break;
      }
   }

   $query .= " ORDER BY `expirationDate` ASC";

   $medicineRes =  mysqli_query($conn, $query);
   


?>

<div class="report-box">

   <div class="report-header">
   <h2 style="text-transform:capitalize"> <?=$range?> Medicines report </h2>
   </div>

   <div class="list-of-data-tbl" id="divToPrint">
      
      <table border="0">
         <thead>
            <tr> 
               <th> No. </th>
               <th> Medicine/Supply </th>
               <th> Expiration Date </th>
               <th> Total Quantity</th>
               <th> SB (San Bartolome) </th>
               <th> BAT (Batasan) </th>
               <th> SF (San Fransisco) </th>
               <th> Date added </th>
            </tr>
         </thead>

         <tbody>
            <?php 
               if(mysqli_num_rows($medicineRes) > 0){
                  $count = 1;
                  while($row = mysqli_fetch_assoc($medicineRes)){

                     
                     $totalQty = totalQty($conn, $row['name']);

                     $dateAdded = $row['date_added'];
                     $dateAdded = new DateTime($dateAdded);
                     $dateAdded = $dateAdded->format('F d, Y');

                     $expDate = $row['expirationDate'];
                     $expDate = new DateTime($expDate);
                     $expDate = $expDate->format('F d, Y');
                     

                     ?>
                     
                        <tr> 
                           <td> <?=$count?></td>
                           <td> <?=$row['name']?> </td>
                           <td> <?=$expDate?></td>
                           <td> <?=$totalQty['total']?> </td>
                          
                           <td> <?=$totalQty['sanBartolome']?> </td>
                           <td> <?=$totalQty['batasan']?> </td>
                           <td> <?=$totalQty['sanFrancisco']?> </td>
                           
                           <td style="text-transform: capitalize"> <?=$dateAdded?> </td>
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
      window.open('../print_details.php?type=medicine&range=<?=$range?>', '_blank');
   });
</script>
