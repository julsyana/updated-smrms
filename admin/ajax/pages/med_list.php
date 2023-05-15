
<?php
   include "../../functions/medicine.php";
   include "../../includes/db_conn.php";
   include "../../functions/function.php";
   include "../../includes/date.php";

   // select all medicine
   $med_res = fetchMedicine($conn);
   
   
?>

   <?php 
      if(mysqli_num_rows($med_res) > 0) {

         while($med_row = mysqli_fetch_assoc($med_res)){

            $expDate = convertDate($med_row['expirationDate']);

            $description = substr($med_row['description'], 0, 120);

            $startingExpDate =  date('Y-m-d', strtotime('-7 day', strtotime($med_row['expirationDate'])));

            $remaining_stock = ($med_row['num_stocks'] - $med_row['med_used']);

            // echo "$curr_date = $startingExpDate = ".$med_row['expirationDate']."<br>";

            if($remaining_stock < 50){

               ?>
                  <p> <b> WARNING!!! </b> <?=$med_row['name']?> is getting out of stock! </p>
               <?php 

            } else if ($remaining_stock == 0) {

               Archive($conn, $med_row['prod_id'], 'medicine', $date_today);

            } else {


               if($curr_date >= $startingExpDate && $curr_date < $med_row['expirationDate']) {

                  ?>
                     <p> <b> WARNING!!! </b> <?=$med_row['name']?> is in brinks of expiration! </p>
                  
                  <?php 
                  
               } else if($curr_date == $med_row['expirationDate']) {
                  
                  Archive($conn, $med_row['prod_id'], 'medicine', $date_today);

               }
   

            }

         

         }


      } 
   ?>

