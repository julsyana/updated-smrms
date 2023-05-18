<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";
   include "../../includes/date.php";

  
   $rangeStart = $_POST['start'];
   $rangeEnd = $_POST['end'];


   $query = "SELECT DISTINCT(name), expirationDate, `date_added` FROM `medicine` 
   WHERE DATE(date_added) BETWEEN '$rangeStart' AND '$rangeEnd'
   ORDER BY `expirationDate` ASC";

   // switch ($range){
   //    case "monthly": {

   //       $fromDate = date('Y-m-d', strtotime('-30 days'));
   //       $today = date("Y-m-d");

   //       $query .= " DATE(date_added) BETWEEN '$fromDate' AND '$today'";

   //       break;
   //    }

   //    case "yearly": {
   //       $fromDate = date('Y-m-d', strtotime('-365 days'));
   //       $today = date("Y-m-d");

   //       $query .= " DATE(date_added) BETWEEN '$fromDate' AND '$today'";
   //       break;
   //    }
   // }

   // $query .= " ORDER BY `expirationDate` ASC";

   $medicineRes =  mysqli_query($conn, $query);

   function formatDate($date, $format){
      $date = new DateTime($date);
      $date = $date->format("$format");

      return $date;
   }

   


?>

<div class="report-box">

   <div class="report-header">
   <h2 style="text-transform:capitalize"> Medicines report </h2>
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
               <th> Medicine/Supply </th>
               <th> Expiration Date </th>
               <th> SB (San Bartolome) </th>
               <th> BAT (Batasan) </th>
               <th> SF (San Fransisco)  </th>
               <th> Total Quantity</th>
               <th> Medicine Given </th>
               <th> Remaining </th>
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
                            <td> <span style="font-size: .9em;"> <?=$row['name']?> </span> </td>
                            <td> <?=$expDate?></td>
                            <td> 
                            
                                <?php if(empty($totalQty['sanBartolome'])){
                                    
                                    echo "0";
                                
                                } else { ?>
                                
                                    <?=$totalQty['rSB']?>
                                
                                <?php }
                                
                                ?>
                               
                                
                            </td>
                            
                            <td>
                                
                                <?php if(empty($totalQty['batasan'])){
                                    
                                    echo "0";
                                
                                } else { ?>
                                
                                    <?=$totalQty['rBAT']?>
                                    
                                <?php }
                                
                                ?>
                               
                            </td>
                            
                            <td> 
                            
                                <?php if(empty($totalQty['sanFrancisco'])){
                                    
                                   echo "0";
                                
                                } else { ?>
                                
                                     <?=$totalQty['rSF']?>
                                    
                                <?php }
                                
                                ?>
                               
                            </td>
                           
                           <td> <?=$totalQty['total']?> </td>
                           <td> <?=$totalQty['totalUsed']?> </td>
                           <td> <?=$totalQty['remaining']?></td>
                           
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
      window.open('../print_details.php?type=medicine&start=<?=$rangeStart?>&end=<?=$rangeEnd?>', '_blank');
   });
</script>
