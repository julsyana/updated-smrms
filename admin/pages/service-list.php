<?php
   include "../includes/function-header.php";
   $serviceID = $_GET['id'];

   $serviceRes = selApp($conn, $serviceID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | <?=$serviceRes['app_type'];?> List </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/appointment.css">

   <!-- for date picker -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

   
    
   
</head>
<body>

   <nav class="side-panel">

      <div class="nav-header">
         <div class="img-logo">
            <div class="img-handler">

               <img src="../assets/QCUClinicLogo.png" alt="QCUClinicLogo.png">
            </div>
         </div>

         <div class="title-logo">
            <p> Student Medical Record </p>
         </div>
      </div>

      <div class="primary-nav">
         <ul>
            <li>
               <a href="./dashboard.php" >
                  <i class="fas fa-chart-area fas-line"></i> Dashboard
               </a>
            </li>

            <li>
               <a href="./admin.php" >
                  <i class="fas fa-users-cog"></i> Admins
               </a>
            </li>

            <li>
               <a href="./department.php" >
                  <i class="fas fa-building    "></i> Departments
               </a>
            </li>

            <li>
               <a href="./nurses.php">
                  <i class="fas fa-user-shield    "></i> Nurses
               </a>
            </li>

            <li>
               <a href="./hospital.php">
                  <i class="fas fa-hospital    "></i> Hospital
               </a>
            </li>

            <li>
               <a href="./medicine.php" >
                  <i class="fas fa-medkit    "></i> Medicines
               </a>
            </li>

            <li>
               <a href="./appointment.php" class="isSelected">
                  <i class="fas fa-calendar-check    "></i> Services
               </a>
            </li>

            <li>
               <a href="./reports.php">
                  <i class="fas fa-folder-open    "></i> Reports
               </a>
            </li>

            <li>
               <a href="./archive.php">
                  <i class="fas fa-archive    "></i> Archive
               </a>
            </li>

            <li>
               <a href="./entrance-log.php">
                  <i class="fas fa-address-book    "></i> Entrance Log
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <main>

      <?php include "../includes/main-header.php" ?>

      <div class="main-content">

         <div class="appointment-container">

            <div class="content-header">

               <h3> <a href="./appointment.php">Services</a> > <?=$serviceRes['app_type'];?> date list </h3>


               <div class="form-button">
                
                  <button class="add-service-date">
                     <i class="fas fa-calendar-plus"></i>
                     <p> Add Date </p>
                  </button>

               </div>
              
            </div>


            <div class="service-list-container">

               <?php 

                  $selSeDates = "SELECT * FROM `appointment_dates` a 
                  JOIN `appointment` b
                  ON a.app_id = b.app_id
                  WHERE a.app_id = '$serviceID' AND a.app_dates > CURDATE()
                  ORDER BY a.app_status DESC, a.app_dates ASC";

                  $resSeDates = mysqli_query($conn, $selSeDates);
                  
                  $exisDate = array();

                  if(mysqli_num_rows($resSeDates) > 0){

                     while($row = mysqli_fetch_assoc($resSeDates)) {

                        $dateSched = date_create($row['app_dates']);
                        $dateSched = date_format($dateSched, "l, F d, Y");

                        $exisDate[] = $row['app_dates'];

                        $dateAdded = date_create($row['date_added']);
                        $dateAdded = date_format($dateAdded, "F d, Y");

                        $timeAdded = date_create($row['date_added']);
                        $timeAdded = date_format($timeAdded, "h:i A");

                        $dateID = $row['app_date_id'];

                        $selStud = "SELECT c.* FROM `stud_appointment` a 
                        JOIN `appointment_dates` b
                        ON a.app_date_id = b.app_date_id
                        JOIN `mis.student_info` c
                        ON a.student_id = c.student_id
                        WHERE a.app_date_id = '$dateID';";

                        $resStud = mysqli_query($conn, $selStud);

                        ?>

                        <div class="se-date">

                           <div>
                              <div class="date-info">
                                 <span style="font-size: .8em;"> ID: <?=$dateID?> </span>
                                 <h2> <?=$dateSched?> </h2>
                                 <p> Remaining slot(s): <span> <?=($row['app_slot'] - $row['num_stud'])?></span></p>
                              </div>

                              <div class="date-student">
                                 <span> Student(s): </span>

                                 <div class="student-list">

                                    <?php
                                       if(mysqli_num_rows($resStud) > 0) {

                                          $counter = 0;

                                          while($studRow = mysqli_fetch_assoc($resStud)){
                                             
                                             if($counter < 10) {

                                                ?> 
                                                   <div class="stud-img">
                                                      <img src="../assets/<?=$studRow['id_image']?>" alt="">
                                                   </div>

                                                <?php 

                                             } else {

                                                ?> 
                                                   <div class="stud-img">
                                                      <p> + </p>
                                                   </div>
                                                <?php 

                                                break;

                                             }
                                            

                                             $counter++;
                                          }

                                       } else {
                                          echo "No student";
                                       }
                                    ?>
                                    

                                    

                                 </div>
                              </div>
                           </div>
                        
                           <div class="date-action">
                              <div class="date-added">
                                 <span> Date added on <?=$dateAdded?> at <?=$timeAdded?> </span>
                              </div>

                              <div class="cancel-app">
                                 

                                 <?php 
                                    if($row['app_status'] == 1){
                                       ?> 
                                          <button class="add-slot-btn"> <i class="fas fa-plus-circle    "></i> Add slot </button> 
                                          <button> Cancel Appointment </button>
                                       <?php
                                    } else {
                                       ?> 
                                          <button class="add-slot-btn" disabled> <i class="fas fa-plus-circle    "></i> Add slot </button> 
                                          <button disabled> <i class="fas fa-times-circle    "></i> Appointment Cancelled </button> 
                                       <?php
                                    }
                                 ?>
                                 
                              </div>

                           </div>

                        </div>

                        <?php 
                     }

                  } else {
                     ?>
                        <div class="se-date">
                           <p> No <?=$serviceRes['app_type'];?> date </p>
                        </div>
                     <?php 
                  }

                  

               ?>

            
            </div>
      </div>

      <!-- Modal for adding dates -->
      <div class="add-service-dates-modal">
         
         <div class="add-date-modal">
            <div class="add-date-title">
               <h3> Add <?=$serviceRes['app_type'];?> date for appointment </h3>

               <div class="close close-btn">
                  <i class="fa fa-times" aria-hidden="true"></i>
               </div>
            </div>

            <form id="add-date-form">

               <input type="hidden" name="se-id" value="<?=$serviceID?>">

               <div class="form-input">
                  <label for="se-slot"> Slots <span>*</span> </label>
                  <input type="number" name="se_slot" id="se-slot" min="1" value="100" max="100" required style="display: block;">
               </div>

               <div class="form-input">
                  <label for="se-dates"> Choose date/s <span>*</span> <span class="message-err"></span></label>
                  <input type="text" name="se_dates" id="se-dates" required style="display:none;">
               </div>

               <div class="form-button">
                  <button type="button" class="close-btn"> Cancel </button>
                  <button type="submit"> Add Service Date </button>
               </div>
            </form>

            <div class="message-box">

            </div>
            
         </div>

      </div>



   </main>
   
</body>

<!-- <script src="../ajax/appointment-modal.js"> </script> -->

<script>

   var existingDates = <?=json_encode($exisDate)?>

   function rmydays(date) {

      return (date.getDay() === 0 || date.getDay() === 6);
      
   }

   const config = {
      mode: "multiple",
      altInput: true,
      altFormat: "Y-m-d",
      dateFormat: "Y-m-d",
      minDate: "today",
      inline: true,
      display: false,
      disable: existingDates,
   }

   flatpickr("#se-dates", config);

</script>


<script>
   $(document).ready(function(){

      $('.add-service-dates-modal').hide();

      $('.add-service-date').click(function(){

         // $('.add-service-dates-modal').modal(2000);
         $('.add-service-dates-modal').show();

      });

      $('.close-btn').click(function(){

         $('.add-service-dates-modal').hide();

      });

      $('#add-date-form').submit(function(e){

         let seDates = $('#se-dates').val();

         e.preventDefault();
         
         const form = $('#add-date-form')[0];
         const formData = new FormData(form);

         
         const seID = "<?=$serviceID?>";

         if(seDates != ''){

            $.ajax({

               type: 'POST',
               url: '../process/add_service_date.php',
               data: formData,
               contentType: false, 
               processData: false,
               cache: false,
               success: function(data){
                  $('.message-box').html(data);

                  window.location.href = "./service-list.php?id=<?=$serviceID?>";
               },

            });

         } else {

            $('.message-err').html('<span> Date required! </span>');

         }

         

      });

      $('#se-dates').change(function(){

         let seDate = $(this).val();
         
         if(seDate != ""){

            $('.message-err').html('');
         }

      });
      
   });
</script>

</html>