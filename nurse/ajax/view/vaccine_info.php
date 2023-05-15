<?php
   
   include "../../includes/db_conn.php";

   if(empty($_POST['stud_id'])){

      $student_id = $_GET['stud_id'];

   } else{

      $student_id = $_POST['stud_id'];
   }

  

   $query = "SELECT * FROM stud_covid_vaccine JOIN stud_booster_shot ON stud_covid_vaccine.id = stud_booster_shot.id where stud_covid_vaccine.student_id = '$student_id'";

   $run_query = mysqli_query($conn1, $query) or die(mysqli_error($conn1));
   
   if(mysqli_num_rows($run_query) > 0){

      while($row = mysqli_fetch_array($run_query)){

         ?>
            <p class="text-center fw-bold" style="color:#0C4079;"> COVID-19 Vaccine Information </p>
            
               <div class=" row p-3 bg-body-secondary rounded-3 mb-3">
              
                  <div class="col-md-6">
                     
                     <div class="mb-3"><span class="fw-bold ">Vaccine</span></div>
 
                     <div class="mb-2"><span class="fw-semibold ">1st Dose</span></div>
 
                     <p> Type of Vaccine: <span> <?=$row['first-vaccine']?> </span></p>
 
                     <p>Date of 1st Dose : <span> <?=$row['first-vaccine_date']?> </span></p>
 
                     <div class="mb-2"> <span class="fw-semibold mb-2">2nd dose</span></div>
 
                     <p>Type of Vaccine : <span> <?=$row['second-vaccine']?> </span></p>
                     
                     <p>Date of 1st Dose : <span> <?=$row['second-vaccine_date']?> </span></p>

                  </div>

                  <div class="col-md-6">

                     <div class="mb-2"><span class="fw-semibold mb-2">Booster Shoot</span></div>
                     
                     <div class="mb-2"><span class="fw-semibold mb-2">1st Dose</span></div>
                     
                     <p>Type of Vaccine : <span> <?=$row['first-booster']?> </span></p>

                     <p>Date of 1st Dose : <span> <?=$row['first-booster_date']?> </span></p>
                     
                     <div class="mb-2"><span class="fw-semibold mb-2">2nd Dose</span></div>

                     <p>Type of Vaccine : <span> <?=$row['first-booster']?> </span></p>

                     <p>Date of 1st Dose : <span> <?=$row['first-booster_date']?> </span></p>

                  </div>
               </div>

               <hr class="border-2">

               <?php
      }
   }   else{

      echo'<h4 class="fw-bold text-center mt-5">No Consultation Data Yet</h4>';

    }


      
?>