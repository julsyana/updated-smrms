<?php

   include "../includes/db_conn.php";
   include "../functions/function.php";
   include "../functions/medicine.php";
   include "../includes/date.php";

   $randomNum = generateID(4);

   // $medCount = mysqli_num_rows(fetchMedicine($conn));

   $med_camp = $_POST['med_camp'];
   $med_id = "M-".$randomNum;
   $med_name = $_POST['med_name'];
   $med_qty = $_POST['med_qty'];
   $med_expDate = $_POST['med_expDate'];
   $med_desc = $_POST['med_desc'];

   $file_name = $_FILES['med_img']['name'];
   $file_tmp_name = $_FILES['med_img']['tmp_name'];
   $file_tmp_error = $_FILES['med_img']['error'];
        
        $path = "../assets";
      
      $imgName = moveImg($path, $file_name, $file_tmp_name, $file_tmp_error);
      
      $ins = insertMed($conn, $med_id, $med_name, $med_qty, $med_expDate, $med_desc, $imgName, $med_camp, $curr_date);

      if($ins){

         ?>
   
         <div class="message-success">
            <h2> Medicine Added Successful </h2>
   
            <div class="icon">
              <i class="fas fa-check-circle    "></i>
            </div>
         </div>
   
   
         <?php
   
      } else { 
   
         ?> 
   
         <div class="message-success">
            <h2> Query Failed </h2>

            <p> <?=mysqli_error($conn)?> </p>
   
            <div class="icon">
              <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
            </div>
         </div>
   
         <?php 
      }


  




  
   


?>





