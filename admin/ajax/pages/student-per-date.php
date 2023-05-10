<?php 

   include "../../includes/db_conn.php";
   include "../../functions/appointment.php";

   $date_id = $_POST['date_id'];
   $se_id = $_POST['se_id'];

   $service = selAppDate($conn, $date_id);

   $sel = "SELECT * FROM `stud_appointment` a
   JOIN `appointment_dates` b
   ON a.app_date_id = b.app_date_id
   JOIN `mis.student_info` c
   ON a.student_id = c.student_id
   WHERE a.app_date_id = '$date_id' AND b.app_dates >= CURDATE() AND a.app_status = 'scheduled';";

   $students = mysqli_query($conn, $sel);

   $formatDate = $service['app_dates'];
   $formatDate = new DateTime($formatDate);
   $formatDate =  $formatDate->format("l, F d, Y");


  
?>


   <div class="cancel-appointment-modal">

      <form id="cancel-date-form">
         
         <div class="modal-header">
            <h3> Are you sure you want to cancel this appointment? </h3>
            <span> <?=$service['app_date_id']?> </span>
            <p> <?=$formatDate?> </p>
         
         </div>
         
         <div class="list-of-students">
            <p> List of students has an appointment: </p>
         
            <div class="students-list">
         
               <ol>
                  <?php
                     $i = 1;
                     if(mysqli_num_rows($students) > 0){
         
                        while($student = mysqli_fetch_assoc($students)){
         
                           // echo 
                           ?>  
                           <li> <?=$i?>. <?=$student['email'];?> </li> 
                           <?php 
         
                           $i++;
                        }
         
                     } else {
                        echo "No students";
                     }
                  ?>
                 
               </ol>
         
            </div>
         
         </div>
         
         
         <div class="cancel-reason">
         
            <div class="form-input">
               <label for="cancel-reason"> Reason </label>
         
               <select name="cancel-reason" id="cancel-reason" required>
                  <option value="">--Select Reason--</option>
                  <option value="Class suspension">Class suspension</option>
                  <option value="Holiday">Holiday</option>
                  <!-- <option value="No staffs available">No staffs available</option>
                  <option value="Equipment/supply issue">Equipment/supply issue</option>
                  <option value="Emergency situation">Emergency situation</option> -->
               </select>
            </div>
         
         </div>
         
         <div class="form-button">
            <button type="button" id="no-btn"> No </button>
            <button id="yes-btn"> 
               <div class="text">
                  <!-- <i class="fas fa-times"></i>  -->
                  Yes
               </div>
         
               <div class="loader">
                  <img src="../../student/assets/loading.gif" alt="">
               </div>
               
            </button>
         
         </div>
         
      </form>
   
      
   </div>


<script>
   $('#no-btn').click(function(){

      $('.cancel-appointment-overlay').css('display', 'none');

   });

   $('#cancel-date-form').submit(function(e){

      e.preventDefault();

      let date_id = "<?=$date_id?>";
      let se_id = "<?=$se_id?>";
      let reason = $('#cancel-reason').val();

      let isConfirm = confirm("Are you sure you want to cancel this date: <?=$formatDate?>");

      if(isConfirm){

         // $('.loader').show();
         $('.loader').css('display', 'flex');
         $('#yes-btn .text').html('Sending Email...');
         
         
         $('#yes-btn').attr('disabled', true);
         $('#no-btn').attr('disabled', true);

         $.ajax({
            
            url: "../process/cancel_date.php",
            type: "POST",
            data: {
               date_id: date_id,
               se_id: se_id,
               reason: reason,
            },
   
            success: function(data){
   
               $('#edit-app-save .text').html(data);

               setTimeout(function(){

                  window.location.href = "./service-list.php?id=<?=$se_id?>";

               }, 3000);

         
            }
         });

      }
      
    

     

   });

</script>

