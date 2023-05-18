<?php
   include "../includes/function-header.php";

   $curdate = date("Y-m-d");

   // echo $curdate;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Report </title>
   <?php include "../includes/head.php"; ?>



   
   <!-- pdfmake cdn -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha512-pAoMgvsSBQTe8P3og+SAnjILwnti03Kz92V3Mxm0WOtHuA482QeldNM5wEdnKwjOnQ/X11IM6Dn3nbmvOz365g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/reports.css">
   
   
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
                  <i class="fas fa-user-shield"></i> Nurses
               </a>
            </li>

            <li>
               <a href="./hospital.php">
                  <i class="fas fa-hospital"></i> Hospital
               </a>
            </li>

            <li>
               <a href="./medicine.php">
                  <i class="fas fa-medkit "></i> Medicines
               </a>
            </li>

            <li>
               <a href="./appointment.php">
                  <i class="fas fa-calendar-check    "></i> Services
               </a>
            </li>

            <li>
               <a href="./reports.php" class="isSelected">
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

         <div class="report-container">

            <div class="content-header">
               <h3> reports </h3>

               <div class="form-button">
                  
                  <select name="" id="type">
                     <option value=""> --Select type of report-- </option>
                     <option value="consultation"> Consultation </option>
                     <option value="appointments"> Appointments </option>
                     <option value="medicine"> Medicine </option>
                  </select>


                  <input type="text" name="" id="range" placeholder="Select date range">

                  <!-- <select name="" id="range">
                     <option value=""> --Select date range-- </option>
                     <option value="monthly"> Monthly </option>
                     <option value="yearly"> Yearly </option>
                  </select> -->
               </div>
            </div>
            
            <div class="report-content-container" id="report-content-container">

            </div>
            
         </div>

      </div>

   </main>
   
</body>

<!-- ajax -->
<script src="../ajax/report.js"></script>

<!-- custom script -->
<script>

   let range = $('#range').flatpickr({

      mode: "range",
      altInput: true,
      altFormat: "F d, Y",
      dateFormat: "Y-m-d",
      maxDate: "today",
      disable: ["<?=$curdate?>"],

      onChange: function(dates){

         if(dates.length == 2){
            let start = formatDate(dates[0]);
            let end = formatDate(dates[1]);
            let type = $("#type").val();


            if (type != "" && (start != "" && end != "")) {
               switch (type) {
               case "appointments":
                  $("#report-content-container").load(
                     "../ajax/pages/report_appointment.php",
                     {
                        type: type,
                        start: start,
                        end: end,
                     }
                  );
                  break;

               case "consultation":
                  $("#report-content-container").load(
                     "../ajax/pages/report_consultation.php",
                     {
                        type: type,
                        start: start,
                        end: end,
                     }
                  );
                  break;

               case "medicine":
                  $("#report-content-container").load(
                     "../ajax/pages/report_medicine.php",
                     {
                        type: type,
                        start: start,
                        end: end,
                     }
                  );
                  break;

               default:
                  break;
               }
            } else if ((start == "" || end == "") && type != "") {
               $("#report-content-container").html("<h1> Select date range </h1>");
            } else {
               $("#report-content-container").html(
               "<h1> Select type of report and date range. </h1>"
               );
            }

            
            $("#type").change(function () {
               let start = formatDate(dates[0]);
               let end = formatDate(dates[1]);
               let type = $(this).val();
               
               if  (type != "" && (start != "" && end != "")) {

                  switch (type) {

                     case "appointments":
                        $("#report-content-container").load("../ajax/pages/report_appointment.php", {
                           type: type,
                           start: start,
                           end: end,
                        });

                     break;
           
                     case "consultation":
                        $("#report-content-container").load("../ajax/pages/report_consultation.php", {
                           type: type,
                           start: start,
                           end: end,
                        });

                     break;
           
                     case "medicine":

                        $("#report-content-container").load("../ajax/pages/report_medicine.php", {
                           type: type,
                           start: start,
                           end: end,
                        });
                     break;
           
                     default:
                     break;
                  }

               } else if (type == "" && range != "") {
                  $("#report-content-container").html("<h1> Select type of report </h1>");
               } else {
                  $("#report-content-container").html(
                   "<h1> Select type of report and date range. </h1>"
                  );
               }
               
            });
         }
      }

   });
   
   // format date
   function formatDate(date) {

      var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

      if (month.length < 2) 
         month = '0' + month;
      if (day.length < 2) 
         day = '0' + day;

      return [year, month, day].join('-');
   }
  

</script>
</html>