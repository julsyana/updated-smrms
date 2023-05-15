<?php
   
   include "../../includes/db_conn.php";

   if(empty($_POST['stud_id'])){

      $student_id = $_GET['stud_id'];

   } else{

      $student_id = $_POST['stud_id'];
   }

  

   $info = "SELECT * FROM consultations WHERE student_id = '$student_id'
   ORDER BY `id` DESC ";
   $run_query = mysqli_query($conn1,$info) or die(mysqli_error($conn1));
   
   if(mysqli_num_rows($run_query) > 0){

      while($row = mysqli_fetch_array($run_query)){
         
         $conDate = $row['date_of_consultation'];
         $conDate = new DateTime($conDate);
         $conDate = $conDate->format("F d, Y h:i A");

         $refNo = $row['reference_no'];

         ?>
            <div class="mb-3 d-flex align-center justify-content-between">

               <div>
                  <span class="fw-semibold"> Status: 
            </span>

                  <?php 
                  if($row['status'] == 'cleared'){ ?>

                     <span class="mx-3"  style="text-transform:capitalize; color: green; padding: 5px 10px; border-radius: 4px;"> <?=$row['status']?> </span>

                  <?php } else {?> 

                     <span class="mx-3"  style="text-transform:capitalize; color: red; padding: 5px 10px; border-radius: 4px;"> <?=$row['status']?> </span>
                  
                  <?php }
               ?>
                
               </div>

               <span class="float-end"><b> Date: </b> <span id="data"> <?=$conDate?> </span>

            </div>

            <div class="mb-2 d-flex flex-wrap">

               <span class="fw-semibold"> Symptoms: </span>

               <span class="mx-3"> <?=$row['symptoms']?></span>

            </div>

            <div class="mb-2 d-flex">

               <span class="fw-semibold"> Body Temperature: </span>

               <span class="mx-3"> <?=$row['body_temp']?></span>

            </div>

            <div class="mb-2 d-flex">
               <span class="fw-semibold">Suspected for Covid-19: </span>
               <span class="mx-3" style="text-transform:capitalize"> <?=$row['suspected_covid']?> </span>
            </div>

            <div class="mb-2 d-flex">
               <span class="fw-semibold">Been tested for covid-19 in the past 10 days: </span>
               <span class="mx-3"> <?=$row['tested_covid']?> </span>
            </div>

            <div class="mb-2">
               <span class="fw-semibold">Medicine Given: (Name/Qty) </span> 
               <ul>
                  <?php 
                        $medQuery = mysqli_query($conn1, "SELECT * FROM `consultations_med` WHERE `ref_no` = '$refNo'");

                        if(mysqli_num_rows($medQuery) > 0){

                           while($medicine = mysqli_fetch_assoc($medQuery)){ ?>

                           <li> <?=$medicine['medicine']?> - <?=$medicine['quantity']?>  </li>

                           <?php } 
                           
                        } ?>
               </ul>
         
            </div>

           

            <div class="mb-2 d-flex" style="align-items: center; justify-content: space-between">
               <div class="mb-2 d-flex">
                  <span class="fw-semibold"> Confined: </span>
                  <span class="mx-3"  style="text-transform:capitalize"> <?=$row['confined']?> </span>
               </div>

               <?php 
                  if($row['status'] == 'not cleared'){ ?>

                     <button data-role="clear-btn" data-id="<?=$refNo?>" class="btn px-2 text-light d-flex justify-content-end" style="background: #0c7932;width:max-content;"> Clear </button>

                  <?php } else {?> 

                     <button data-role="view-excuse-btn" data-id="<?=$refNo?>" class="btn px-2 text-light d-flex justify-content-end" style="background: #0C4079;width:max-content;"> View Excuse Slip </button>

                  
                  <?php }
               ?>
              
               

            </div>


            <hr class="border-2">
         <?php

      }
   }   else{

      echo'<h4 class="fw-bold text-center mt-5">No Consultation Data Yet</h4>';

   }


      
?>
<script>
   $(document).ready(function(){
      $('button[data-role=view-excuse-btn]').click(function(){

         let ref_no = $(this).data('id');

         window.open('./excuse-slip.php?ref-no=' + ref_no, '_blank');
      });


      $('button[data-role=clear-btn]').click(function(){
         let ref_no = $(this).data('id');

         let isConfirm = confirm('Are you sure you want to clear this student?');

         if(isConfirm){
            $.ajax({
               type: "POST",
               url: "../process/clear_consultation.php",
               data: {
                  ref_no: ref_no
               },
               success: function(data){

                  $('.sample-output').html(data);

               }
            })
         }
      });
   });
</script>