<?php
   
   include "../../includes/db_conn.php";

   if(empty($_POST['stud_id'])){

      $student_id = $_GET['stud_id'];

   } else{

      $student_id = $_POST['stud_id'];
   }

  

   $query = "SELECT * FROM stud_family_med_history where student_id = '$student_id'";
   $run_query = mysqli_query($conn1, $query) or die(mysqli_error($conn1));
   
   if(mysqli_num_rows($run_query) > 0){

      while($row = mysqli_fetch_array($run_query)){

         ?>
            <div class="row">

               <div class="col-md-6">
                  <h4 class="fw-bold">Father Record</h4>
                  <p> 
                    <span class="fw-semibold"> Name: </span> 
   
                    <span>Mario Del Pilar</span>
                  </p>
                  
                  <ul>
                     <li> <?=$row['father']?> </li>
                  </ul>

               </div>

               <div class="col-md-6">
                  
                  <h4 class="fw-bold">Mother Record</h4>
                  
                  <p>
                     <span class="fw-semibold";>Name: </span>

                     <span>Maria Del Pilar</span>
                  </p>
                  
                  <ul>
                     <li> <?=$row['mother']?></li>
                  </ul>
               </div>
            </div>
         <?php 

      }   
   
   } else{

      echo'<h4 class="fw-bold text-center mt-5">No Consultation Data Yet</h4>';

    }


      
?>