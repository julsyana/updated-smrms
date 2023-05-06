
<?php
    include "../includes/db_conn.php";
    include "../functions/appointment.php";

    $app_id = $_POST['app_id'];

    $appRes = selApp($conn, $app_id);
    
?>

<div class="modal-container edit-appointment-container" id="edit-appointment-container">
    
    <div class="modal-header">
       <h3> Edit <?=$appRes['app_type']?> Service Details <span id="app-mess"></span> </h3>
    </div>

    <div class="modal-content">

        <form id="edit-appointment-form">
 
           <div class="form-input">
              <label for="app-slot"> Service ID: </label>
              <input type="text" name="app_id" value="<?=$appRes['app_id']?>" readonly> 
           </div>
 
           <div class="form-input">
              <label for="app-type"> Appointment Type: </label>
              <input type="text" name="app_type" value="<?=$appRes['app_type']?>"> 
           </div>

           <!-- <div class="form-input">
               <label for="app-status"> Status: </label>
               
               <select name="app_status" id="app-status">
                   <?php 
                       if($appRes['status'] == 1){?>

                           <option value="1"> On </option>
                           <option value="0"> Off </option>
                           
                       <?php } else { ?>

                           <option value="1"> Off </option>
                           <option value="0"> On </option>
                                                                           
                       <?php 
                       }
                   ?>
               </select>
           </div> -->

           <div class="student-email">

           </div>
 
        
          
 
           <div class="form-button">
              <button type="button" id="edit-app-cancel"> Cancel </button>
              <button type="submit" id="edit-app-save"> Save Changes </button>
           </div>
        </form>
        
    </div>

</div>


<script>
   $(document).ready(function(){

      $('#edit-app-cancel').click(function(){

          $("#modal-overlay-container").hide();

          $('#edit-appointment-container').hide();

      });

      $('#edit-appointment-form').submit(function(e){
        e.preventDefault();

        alert('submitted'); 
      });

    //   $('#app-status').change(function(){

    //     let se_status = $(this).val();

    //     const se_id = "<?=$app_id?>";

    //     if(se_status == 0){

    //         $('.student-email').html("fetch all students email here");

    //     } else {

    //         $('.student-email').html("");

    //     }

    //   });

   });

</script>


