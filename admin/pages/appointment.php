<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Services </title>
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
                  <h3> SERVICES </h3>

               <div class="form-button">
                

                  <button class="add-appointment">
                     <i class="fas fa-calendar-plus"></i>
                     <p> Add New Services </p>
                  </button>

               </div>
              
            </div>


            <div class="appointment-list-container">

               <table border="0"> 

                  <thead>
                     <tr> 
                        <th> Service ID </th>
                        <th> Service Type </th>
                        <th> Date Created	</th>
                        <th style="text-align: center;"> Status </th>
                        <th style="width: 20%; text-align: center;"> Action </th>
                     </tr>
                  </thead>
                 

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($app_res) > 0) {

                           while($row = mysqli_fetch_assoc($app_res)){ 
                              
                              $date = $row['date_filed'];
                              $date = new DateTime($date);
                              $date = $date->format("F d, Y h:i A");

                              if($row['status'] == 0){
                                 $status = "off";
                              } else {
                                 $status = "on";
                              }
                              
                           ?>
                           
                           <tr>
                              <td> <?=$row['app_id']?> </td>
                              <td> <?=$row['app_type']?> </td>
                              <td> <?=$date?> </td>
                              <td style="text-align: center;"> <?=$status?> </td>
                              
                              <td>
                                 <div class="action-button">
                                    <button id="edit-service" data-role="edit-se" data-se_id="<?=$row['app_id']?>"> <i class="fas fa-edit"></i> Edit </button>

                                    <?php
                                       if($row['status'] == 0){

                                          ?>

                                          <a class="disabled"> 
                                             <i class="fas fa-list"></i>
                                             View list  
                                          </a>

                                          <?php
                                          

                                       } else {
                                          ?>

                                          <a href="./service-list.php?id=<?=$row['app_id']?>"> 
                                             <i class="fas fa-list"></i>
                                             View list  
                                          </a>

                                          <?php
                                       }
                                    ?>
                                   
                                 </div>   
                              </td>
                           </tr>



                           <?php }
                        } else {
                           echo "<tr> <td colspan='5' style='text-align:center;'> No appointment </td> </tr>";
                        }
                     ?>
                     

                     
                  </tbody>
               </table>

            </div>

      </div>


      <!-- Modal -->
      <div id="modal-overlay-container" class="modal-overlay-container">
         <!-- Add new appointment -->

         <!-- Appointment Details -->
      </div>


   </main>
   
</body>

<script src="../ajax/appointment-modal.js"> </script>

</html>