<?php
   
   include "../../includes/db_conn.php";

   if(empty($_POST['stud_id'])){

      $student_id = $_GET['stud_id'];

   } else{

      $student_id = $_POST['stud_id'];
   }

  

   $query = "SELECT * FROM stud_health_history where student_id = '$student_id'";
   $run_query = mysqli_query($conn1, $query) or die(mysqli_error($conn1));
   
   if(mysqli_num_rows($run_query) > 0){

      while($row = mysqli_fetch_array($run_query)){
         
         $asthma = $row['has_asthma'];

         ?>
            <div class=" row p-3 bg-body-secondary rounded-3 mb-3">
              
               <div class="col-md-4">
             
                  <p><span class="fw-semibold">Head Injury</span> : <span><?=$row['head_injury']?></span></p>
                  <p><span class="fw-semibold">Eye Problem</span> : <span><?=$row['eye_problem']?></span></p>
                  <p><span class="fw-semibold">Wear Lenses</span> : <span><?=$row['wear_lenses']?></span></p>
                  <p><span class="fw-semibold">Ear Problem</span> : <span><?=$row['ear_problem']?></span></p>
                  
                  <p><span class="fw-semibold">Asthma</span> : <span><?=$row['has_asthma']?> </span> </p>

               <?php
                  if($row['has_asthma'] !== "None") { 

                     ?>

                     <ul>
                        <li>
                           <p>
                              <span class="fw-semibold"> Medecine </span> : 
                              <span><?=$row['asthma_med']?></span>
                           </p>
                        </li>
                        
                        <li>
                           <p>
                              <span class="fw-semibold">Date</span> : 
                              <span><?=$row['asthma_date']?></span>
                           </p>
                        </li>
                        
                     </ul>
                     <?php
                  }
               ?>

               <p> <span class="fw-semibold"> Ulcer</span> : <span><?=$row['has_ulcer']?></span></p>

               <?php 

                  if($row['has_ulcer'] !== "None"){ ?>
                     <ul>
                        <li>
                           <p>
                              <span class="fw-semibold">Medecine</span> : <span><?=$row['ulcer_med']?></span>
                           </p>
                        </li>
                     </ul>    
                  <?php } ?>
                  
               </div>
               
               <div class="col-md-4">
                  
                  <p>
                     <span class="fw-semibold">Pulmonary tuberculosis</span> :
                     <span><?=$row['has_ptb']?></span>
                  </p>

                  <?php 
                  
                  if($row['has_ptb'] !== "None"){ ?>
                     
                     <ul>
                        <li>
                           <p>
                              <span class="fw-semibold">Date Diagnose</span> : <span><?=$row['ptb_date_diag']?></span>
                           </p>
                        </li>
                        
                        <li>
                           <p>
                              <span class="fw-semibold">Started/span> : <span><?=$row['ptb_date_med_start']?></span>
                           </p>
                        </li>

                     </ul>
                     
                  <?php } ?>
                  
                  <p> <span class="fw-semibold"> Heart Problem</span> : <span><?=$row['heart_problem']?></span></p>

                  <?php 

                  if($row['heart_problem'] !== "None"){ ?>

                     <ul>
                        <li><p><span class="fw-semibold">Specify</span> : <span><?=$row['hp_spec']?></span></p></li>

                        <li><p><span class="fw-semibold">Medicine</span>M : <span><?=$row['hp_med']?></span></p></p></li>

                     </ul>

                  <?php } ?>

                  <p><span class="fw-semibold">Allergy</span> : <span><?=$row['has_allergy']?></span></p>

                  <?php 
                  if($row['has_allergy'] !== "None"){ ?>
                     <ul>
                        <li><p><span class="fw-semibold">Specify </span> : <span><?=$row['allergy_spec']?></span></p></li>
                        
                        <li><p><span class="fw-semibold">Medicine</span> : <span><?=$row['allergy_med']?></span></p></p></li>

                     </ul>
                  <?php }    ?>
               </div>

               <div class="col-md-4">

                  <p><span class="fw-semibold">Hospitalized</span> : <span><?=$row['hospitalized']?></span></p>

                  <?php
                  if($row['hospitalized'] !== "No"){ ?>
                     <ul>
                       <li>
                       <p><span class="fw-semibold">Hospitalized Details</span> : <span><?=$row['hospitalized_details']?></span></p>
                       </li>
                     </ul>
                  <?php } ?>

                  <p><span class="fw-semibold">Seizure</span> : <span><?=$row['has_seizure']?></span></p>
                  <p><span class="fw-semibold">Fracture</span> : <span><?=$row['has_fracture']?></span></p>
                  <p><span class="fw-semibold">vices</span>  : <span><?=$row['has_vices']?></span></p>
                  <p><span class="fw-semibold">other </span> : <span><?=$row['other']?></span></p>
                  
               </div>
               
               <hr class="border-2">
         <?php

      }
   }   else{

      echo'<h4 class="fw-bold text-center mt-5">No Consultation Data Yet</h4>';

    }


      
?>