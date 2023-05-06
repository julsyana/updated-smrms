

<?php 

   include "../../includes/db_con.php";
   error_reporting(1);

   $dateID = $_POST['se_date'];
   $seID = $_POST['med_type'];

   $selDate = "SELECT * FROM `appointment_dates` a 
   JOIN `appointment` b
   ON a.app_id = b.app_id
   WHERE a.app_id = '$seID' AND a.app_dates = '$dateID';";

   $preDate = mysqli_query($conn, $selDate);

   if(mysqli_num_rows($preDate) === 1){

      $date = mysqli_fetch_assoc($preDate);

      $formattedDate = new DateTime($dateID);
      $formattedDate = $formattedDate->format("l, F d, Y");

   }
?>


<div class="preview-modal">
   <div class="preview-header">
      <h3> Review your details before submitting </h3>
   </div>

   <div class="preview-content">
      <div class="form-review">
         <label for="#"> type of service: </label>
         <p> <?=$date['app_type']?> </p>
      </div>

      <div class="form-review">
         <label for="#"> selected date: </label>
         <p> <?=$formattedDate?>, 7:00 AM - 5:00 PM  </p>
      </div>

      <div class="form-review">
         <label for="#"> reason: </label>
         <p> <?=$_POST['roa']?> </p>
      </div>

   </div>

   <div class="form-button">
      <button type="button" id="close-modal-message"> Close </button>
      <button type="submit" id="submit-btn"> 
         <p id="submit-btn-text">
            Submit
         </p>
          
         <img src="../../assets/loading.gif" class="loader" id="loader">
      </button>
   </div>

</div>

<script>

   $('.loader').hide();
   
   $('#close-modal-message').click(function(){

      $('#preview-app-modal').hide();

   });
</script>