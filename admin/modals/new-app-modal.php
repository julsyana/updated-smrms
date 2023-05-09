
<?php include "../includes/date.php"; ?>


<div class="modal-container new-appointment-container" id="new-appointment-container">
    
    <div class="modal-header">
       <h3> Add New Service <span id="app-mess"></span> </h3>
    </div>

    <div class="modal-content">

       <form id="appointment-form">

          <div class="form-input">
             <label for="app-type"> Service name: </label>
             <input type="text" name="app_type" id="app-type" required>
          </div>

          <div class="form-button">
             <button type="button" id="new-app-cancel"> Cancel </button>
             <button type="submit" id="new-app-add"> Add Service </button>
          </div>
       </form>

    </div>

</div>

<script>
   $(document).ready(function(){

      $('#appointment-form').submit(function(e){

         e.preventDefault(); 

         const form = $('#appointment-form')[0];
         const formData = new FormData(form);

         $.ajax({
            type: "POST",
            url: "../process/add_appointment.php",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function(data){

              $("#modal-overlay-container").html(data);

              $("#modal-overlay-container").fadeOut(3000);

            },
            

         });
         
      });


      $('#new-app-cancel').click(function(){

          $("#modal-overlay-container").hide();

          $('#new-appointment-container').hide();

      });
      

   });

</script>

<!-- custom script -->
<script src="../js/date_picker.js"></script>
