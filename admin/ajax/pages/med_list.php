
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

            $remaining_stock = ($med_row['num_stocks'] - $med_row['med_used']);
            
            // $percent10 = (($med_row['num_stocks'] * 20) / 100);


            // stocks
            $sel = "SELECT * FROM `critical_level`
            WHERE `type` = 'stock'
            ORDER BY `date_created` DESC LIMIT 1";
   
            $result = mysqli_query($conn, $sel);

            $stock_cl = mysqli_fetch_assoc($result);


            // expiration date
            $resED = mysqli_query($conn, "SELECT * FROM `critical_level`
            WHERE `type` = 'expDate'
            ORDER BY `date_created` DESC LIMIT 1");

            $expDate_cl = mysqli_fetch_assoc($resED);


            if(mysqli_num_rows($resED) === 1){

               $day = $expDate_cl['stock_expDate'];

               $startingExpDate =  date('Y-m-d', strtotime('-'.$day.' day', strtotime($med_row['expirationDate'])));

            } else {
               $startingExpDate =  date('Y-m-d', strtotime('-30 day', strtotime($med_row['expirationDate'])));
            }


         
         
         
            // stocks   
            if ($remaining_stock == 0) {

               Archive($conn, $med_row['prod_id'], 'medicine', $date_today);
               ?>
                <script>
                
                    window.location.href = "./medicine.php";
                
                </script>
               <?php 
               

            }

            if($remaining_stock <= $stock_cl['stock_expDate']){

               ?>
                  <p> <b> WARNING!!! </b> Only <?=$remaining_stock?> of the <?=$med_row['name']?> stock left! </p>
               <?php 


            }
            
            // Expiration date
            if($curr_date >= $startingExpDate && $curr_date < $med_row['expirationDate']) {

                  ?>
                     <p> <b> WARNING!!! </b> <?=$med_row['name']?> is in brinks of expiration! </p>
                  
                  <?php 
                  
            }
            
            
            if($med_row['expirationDate'] <= $curr_date) {
                  
                 Archive($conn, $med_row['prod_id'], 'medicine', $date_today);

            }

         

         }


      } 
   ?>


