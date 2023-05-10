<?php

   include "../includes/db_conn.php";
   include "../functions/appointment.php";

   $date_id = $_POST['date_id'];

   $service = selAppDate($conn, $date_id);

   $formatDate = $service['app_dates'];
   $formatDate = new DateTime($formatDate);
   $formatDate =  $formatDate->format("l, F d, Y");

   $remaingSlot = $service['app_slot'] - $service['num_stud'];
   
?>

<div class="add-slot-modal">
   <div class="modal-header">
      <h4> <i class="fas fa-plus-circle"></i> Add slot </h4>
      <span> ID: <?=$date_id?> </span>
      <p> <?=$formatDate?> </p>
   </div>

   <div class="add-slot-content">
      <div class="form-input">
         <label for=""> Remaining Slot: </label>
         <input type="text" value="<?=$remaingSlot?>" id="" disabled>
      </div>

      <div class="form-input">
         <label for=""> Insert number of slot: </label>
         <input type="number" max="30" min="1" value="30" id="add-slot" required>
      </div>
   </div>


   <div class="form-button">
      <button id="cancel-modal-slot"> Cancel </button>
      <button id="add-slot-btn"> <i class="fas fa-plus-circle" ></i> Add </button>
   </div>
</div>


<script>
   $('#cancel-modal-slot').click(function(){
      
      $('#add-slot-overlay').css('display', 'none');

   });


   $('#add-slot-btn').click(function(){

      let slot = $('#add-slot').val();
      let dateID = "<?=$date_id?>";

      let isConfirm = confirm(dateID + " Are you sure you want to add " + slot + " slot(s) in this date: <?=$formatDate?>");

      if(isConfirm){

         $.ajax({

            url: "../process/add_slot.php",
            type: "POST",
            data: {
               slot: slot,
               dateID: dateID
            },
            success: function(data){

               $('#add-slot-overlay').css('display', 'none');

               window.location.href = "./service-list.php?id=<?=$service['app_id']?>";


            },

         });

      }

   


   });
</script>
