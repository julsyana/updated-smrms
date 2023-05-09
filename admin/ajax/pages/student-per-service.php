<?php

   include "../../includes/db_conn.php";
   include "../../functions/appointment.php";
   include "../../includes/date.php";

   $app_id = $_POST['se_id'];

   $appRes = selApp($conn, $app_id);

   $allStudentsPerService = selStudPerService($conn, $app_id);

   $time = date("h:i A");


?>

<ul>
  
   <?php

         $i = 1;

         if(mysqli_num_rows($allStudentsPerService) > 0) {
            ?>

               <li class="header">
                  <p style="color: #0008; font-weight: 500; font-size: .9em"> List of students has an appointment in <span style="color: #000"> <?=$appRes['app_type']?> </span>: </p>
               </li>
   
            <?php 

            while($row = mysqli_fetch_assoc($allStudentsPerService)) { 
               
               ?>

               <li> 
                   <div class="student">
                       <p> <?=$i?>. </p>
                       <div class="profile">
                           <img src="../assets/<?=$row['id_image']?>" alt="Student profile">
                       </div>

                       <div class="email">
                           <p> <?=$row['email']?> </p>
                       </div>
                   </div>
               </li>
               
               <?php 
               
               $i++; 
            
            }

         } else {
            ?>
               <li class="header">
                  <p style="color: #0008; font-weight: 500; font-size: .9em"> No Students </p>
               </li>
            <?php 
         }

       
   ?>

   
</ul>