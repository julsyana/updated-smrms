<?php
   include "../includes/header_process.php";

   if(mysqli_num_rows($sel_services) == 0){

      header("location: ./appointment-list.php");

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../assets/favcon.png"/> <!-- Icon -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/appointment.css">

   <!-- Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


   <!-- flatpickr -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



   <title> SMRMS | STUDENT | New Appointment </title>
</head>
<body>

   

   <div class="side-panel">

      <?php include "../includes/profile_nav.php" ?>
        
      <nav class="nav primary-nav">
         
         <div class="sub-header">
         
            <p> Main </p>
         
         </div>
         
         <ul>
            <li> 
               <a href="./dashboard.php"> Dashboard </a>
            </li>
            
            <li > 
               <a href="./personal-information.php"> Personal Information </a>
            </li>
         
            <li> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li> 
               <a href="./medical-history.php"> Medical History </a>
            </li>

            <li> 
               <a href="./health-history.php"> Health History  </a>
            </li>
         
         
            <li class="selected"> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

             <li> 
               <a href="./entrancelog.php"> Entrace Log </a>
            </li>
         </ul>
        
      </nav>
        
      <nav class="nav secondary-nav">
        
         <div class="sub-header">
         
            <p> Settings </p>
         
         </div>
        
         <ul>
            <li> 
               <a href="./manage-account.php"> Manage Account </a>
            </li>
         
            <li> 
               <a href="../../process/logout.php"> Logout </a>
            </li>
         </ul>
        
      </nav>
        
   </div>

   <main>

      <header>

         <div class="logo">
            <img src="../../assets/favcon.png" alt="">
         </div>

         <div class="title">
            <h1> Student Medical Record </h1>
         </div>

      </header>

      <div class="container">

         <div class="appointment-details-container">

            <div class="link-header">
               <h3> <a href="./appointment-list.php"> Appointment List</a> > Add New Appointment </h3>
            </div>

            <div class="appointment-detail">

               <h3> Appointment Details </h3>

               <form id="add-appointment-form" enctype="multipart/form-data">

                  <div class="type-of-appointment">

                     <div class="form-input">
                        <select name="med_type" id="med-type" required> 
                           

                           <?php 
                              if(mysqli_num_rows($sel_services) > 0) {

                                 ?> <option value=""> Type of Appointment </option>  <?php 

                                 while($row = mysqli_fetch_assoc($sel_services)){

                                    ?> <option value="<?=$row['app_id']?>"> <?=$row['app_type']?> Service </option>  <?php 
                                 }

                              } else {

                                 ?> <option value=""> No Services </option>  <?php 

                              } 
                              
                              ?>
                        </select>
                     </div>

                     <div class="form-input flatpickr">
                        <label for="se-dates"> Choose available dates <span>*</span><span id="date-err-mess"> </span></label>

                        <div id="set-date-slot">
                           <div id="set-date">
                              <input type="text" id="se-dates" name="se_date[]" class="se-dates" placeholder="Select Date" disabled>
                           </div>
                          
                           <div class="slot" id="set-slot"> 
                              
                           </div>
                        </div>
                     
                     </div>

                     <div class="form-input">
                        <label for="roa"> Reason for Appointment <span>* <span class="roa-message"></span></span> </label>
                        <textarea name="roa" id="roa" placeholder="(Required)" required></textarea>
                     </div>


                     <div class="form-input image-multi">
                        <label for="multi-image"> 
                           <p> Drag & Drop to Upload </p>
                           <p> or </p>
                           <p> Browse </p>

                           <span> (JPEG, JPG, PNG, jpeg, jpg, png only) </span>
                        </label>

                        <input type="file" name="multiImg[]" onchange="Preview()" id="multi-image" multiple accept="image/*" hidden>

                        <p id="num-files-chosen"> No Files Chosen </p>

                        <div class="file-viewer" id="file-viewer">

                        </div>
                     </div>

                   

                     <div class="form-button-next">

                        <div class="form-button">

                           <a href="./appointment-list.php"> Back </a>
                           
                           <button type="button" name="submitBtn" id="appoint-next"> Submit </button>

                        </div>


                     </div>
                  </div>

                  
                  <div class="preview-app-modal" id="preview-app-modal">

                     
                    
                  </div>
               
               </form>

            </div>

            <div class="overlay-modal">

            </div>

         </div>

      </div>

   </main>

</body>

<!-- <script src="../js/calendar.js"></script>   -->
<script src="../js/image_viewer.js"> </script>

<script>


 
</script>

<script>
   $(document).ready(function(){

      $('.type-of-appointment').show();
      $('#preview-app-modal').hide();


      $('#med-type').change(function(){

         let se_id = $(this).val();

         if(se_id != '') {

            $('#set-date').load('../ajax/view/service_dates.php', {
               se_id: se_id
            });     
              
         } else {

            $('#set-date-slot').load('../ajax/view/default_date.php');

         }

      });


      $('#add-appointment-form').submit(function(e){

         let se_date = $('#se-dates').val();

         const form = $('#add-appointment-form')[0];
         const formData = new FormData(form);


         if(se_date != ''){

            $('.loader').show();
            
            $('#submit-btn-text').text('Sending Email...');

            $('#submit-btn').attr('disabled', true);
            $('#close-modal-message').attr('disabled', true);


            $.ajax({

               type: 'POST',
               url: '../../process/validate_appointment.php',
               data: formData,
               contentType: false, 
               processData: false,
               cache: false,
               success: function(data){

                  window.location.href = "./appointment.php?mess=success";               
               },

            });


         



          
            
            
          

         } else {

            $('#date-err-mess').html("Please select date");
         }

         

         e.preventDefault();

      });


      $('#appoint-next').click(function(){

         let se_date = $('#se-dates').val();
         let med_type = $('#med-type').val();
         let roa = $('#roa').val();

         if(se_date != '' && med_type != '' && roa != ''){

            $('#preview-app-modal').show();

            $('#preview-app-modal').load('../ajax/view/preview_app.php', {

               se_date: se_date,
               med_type: med_type,
               roa: roa,

            });

         }

      

         if(se_date != ''){

            $('#date-err-mess').html("");

         } else {

            $('#date-err-mess').html("Please select date");
         }
         
      });

   });
</script>
</html>
