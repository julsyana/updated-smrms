<?php
   include "../includes/function-header.php";
   // include "../functions/dashboard.php";
   $id = $_SESSION['user_id'];
   // $emp_id = $_SESSION['emp_id'];
//   $base_url = 'http://localhost/updated-smrms';
     $base_url = 'https://qcu-smrms.site';

   
// SELECT ALL ANNOUNCEMENTS
$selAnnounce = mysqli_query($conn, "SELECT * FROM `announce` ORDER BY  `date` DESC, `time` DESC;");

// SELECT ALL NURSES
// $fetchNurseAccount = mysqli_query($conn, "SELECT * FROM `nurses` WHERE emp_id = '$emp_id'");
// $nurse = mysqli_fetch_assoc($fetchNurseAccount);

$date = date("Y-m-d"); // Get current date in "YYYY-MM-DD" format
$fetchActiveNurses = mysqli_query($conn, "SELECT * FROM `nurse_schedule` JOIN `nurses` ON `nurse_schedule`.`emp_id` = `nurses`.`emp_id` WHERE `nurse_schedule`.`schedule_day` = 'Thursday'");

     // SELECT ALL STUDENTS 
     $fetchAllStudents = mysqli_query($conn, "SELECT * FROM `student_account`");
     
     // COUNT ALL STUDENTS
     $fetchStudents = mysqli_query($conn, "SELECT COUNT(*) as totalStud FROM `student_account`");
     $countStudents = mysqli_fetch_assoc($fetchStudents);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Dashboard </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/dashboard.css">
   
   
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
               <a href="./dashboard.php" class="isSelected">
                  <i class="fas fa-chart-area fas-line"></i> Dashboard
               </a>
            </li>

            <li>
               <a href="./admin.php" >
                  <i class="fas fa-users-cog"></i> Admins
               </a>
            </li>

            <li>
               <a href="./department.php">
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
               <a href="./medicine.php">
                  <i class="fas fa-medkit    "></i> Medicines
               </a>
            </li>

            <li>
               <a href="./appointment.php">
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

         <div class="dashboard">

            <div class="content-header">
               
               <h3> Analytics </h3>
            </div>

            <div class="card-count">

               <div class="card admin">

                  <div class="card-header">
                     <i class="fas fa-users-cog"> </i>
                     <p> Admins</p>
                  </div>

                  <div class="card-number">
                     <h2> <?=$total_admins?> </h2>
                  </div>   

               </div>

               <div class="card nurse">

                  <div class="card-header" style="background-color: #E49F30;">
                     <i class="fas fa-user-shield    "></i>
                     <p> Nurse </p>
                  </div>

                  <div class="card-number"  style="background-color: #F3AF43;">
                     <h2> <?=$total_nurse?> </h2>
                  </div>   

               </div>

               <div class="card students">

                  <div class="card-header" style="background-color: #72AE32;">
                     <i class="fas fa-user-graduate"></i>
                     <p> Students </p>
                  </div>

                  <div class="card-number" style="background-color: #84BF46;">
                     <h2>  <?=$countStudents['totalStud']?> </h2>
                  </div>   

               </div>

               <div class="card dept">

                  <div class="card-header" style="background-color: #0C52BB;">
                     <i class="fas fa-building" > </i>
                     <p>  Department </p>
                  </div>

                  <div class="card-number" style="background-color: #2C6AC8;">
                     <h2> <?=$total_dept?> </h2>
                  </div>   

               </div>

               <div class="card ent-log">

                  <div class="card-header" style="background-color: #7C7C7C;">
                     <i class="fas fa-address-book    "></i>
                     <p> Entrance Log </p>
                  </div>

                  <div class="card-number" style="background-color: #999999;">
                     <h2> <?=$total_eLog?> </h2>
                  </div>   

               </div>
            </div>
            
           
         <div class="chart_container">

               <div class="card_content1">

                      <div class="post-announcement">
                        <div class="title-announce">
                            <!--<img src="../assets/announcement.png" width="50" height="50" alt="" />-->
                            <h3> POST AN ANNOUNCEMENT </h3>
                        </div>

                        
                        <div class="post">
                            <form action="../process/announcement.php" method="POST">
                                <textarea name="announcement" placeholder="Write an announcement here..." required></textarea>
                                <div class="action-post">
                                    <p id="message"> Posted Successfuly </p>
                                    <input type="submit" value="POST" name="announceBtn">
                                </div>
                            </form>
                        </div>
                        
                    </div>

               </div>

               
               
                <!--<h3> ENTRANCE LOG </h3>-->
               <div class="card_content">
                  <div class="chart_header">
                     <span>ENTRANCE LOG</span>
                  </div>
                  
                  <br>
                  
                  <div class="chart1" style="display:flex; justify-content:center; align-items:center;">
                     <canvas id="myChart2" class="circle_chart"></canvas>
                  </div>
               </div>
           
            </div>


            <div class="chart_container">
               
               <div class="card_content2">

              <div class="posted-announcement">
                        <h3> NURSES ANNOUNCEMENTS </h3>
                        <div class="announcements">
                              <?php
                                if ($selAnnounce -> num_rows > 0){
                                    while ($row = $selAnnounce -> fetch_assoc()){ ?>
                                        <div class="announce-prof">
                                            <h5> 
                                                <img src="../assets/<?=$row['image']?>" width="50" height="50" alt="" />
                                                <span style="margin-right: auto; font-size: 14px; font-weight: 600;"> &nbsp; <?=$row['firstname']?> <?=$row['lastname']?>, RN </span>
                                                <span class="date-time"> <b><?=$row['approve_status'] == ""? "new" : $row['approve_status']?></b>&nbsp;</span>
                                                <span class="date-time"> <?=$row['date']?> <?=$row['time']?></span>
                                            </h5>
                                            <br>
                                            <p style="margin-left: auto; margin-top: -20px; font-size: 14px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$row['announcement'];?> </p>
                                            <div>
                                             <?php 
                                               if($row["approve_status"] == ""){
                                                ?>
                                                   <div class="div_approve_status_actions_container">
                                                      <button class="btn_approve" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=approve&postID=".$row['id']."&status=approved`" ?>">Approve</button>
                                                      <button class="btn_decline" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=decline&postID=".$row['id']."&status=declined`" ?>">Decline</button>
                                                   </div>
                                                <?php
                                               }
                                               else{
                                                if($row["approve_status"] == "approved"){
                                                   ?>
                                                      <div class="div_approve_status_actions_container">
                                                         <button class="btn_revert" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=revert&postID=".$row['id']."&status=pending`" ?>">Revert</button>
                                                         <!--<button class="btn_approve" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=edit&postID=".$row['id']."&status=edited`"?>">Edit</button>-->
                                                         <!--<button class="btn_decline" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=delete&postID=".$row['id']."&status=deleted`"?>">Delete</button>-->
                                                      </div>
                                                   <?php
                                                }
                                                else if($row["approve_status"] == "new"){
                                                   ?>
                                                      <div class="div_approve_status_actions_container">
                                                         <button class="btn_approve" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=approve&postID=".$row['id']."&status=approved`" ?>">Approve</button>
                                                         <button class="btn_decline" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=decline&postID=".$row['id']."&status=declined`" ?>">Decline</button>
                                                      </div>
                                                   <?php
                                                }
                                                else if($row["approve_status"] == "pending"){
                                                   ?>
                                                      <div class="div_approve_status_actions_container">
                                                         <button class="btn_approve" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=approve&postID=".$row['id']."&status=approved`" ?>">Approve</button>
                                                         <button class="btn_decline" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=decline&postID=".$row['id']."&status=declined`" ?>">Decline</button>
                                                      </div>
                                                   <?php
                                                }
                                                else if($row["approve_status"] == "declined"){
                                                   ?>
                                                      <div class="div_approve_status_actions_container">
                                                         <button class="btn_approve" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=approve&postID=".$row['id']."&status=approved`" ?>">Approve</button>
                                                      </div>
                                                   <?php
                                                }
                                                else{
                                                   ?>
                                                      <div class="div_approve_status_actions_container">
                                                         <button class="btn_approve" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=approve&postID=".$row['id']."&status=approved`" ?>">Approve</button>
                                                         <button class="btn_decline" onclick="<?php echo "location.href = `".$base_url."/admin/functions/dashboard.php?action=decline&postID=".$row['id']."&status=declined`" ?>">Decline</button>
                                                      </div>
                                                   <?php
                                                }
                                               }
                                             ?>
                                            </div>
                                        </div>
                                 <?php }
                                } ?>
                           
                           
                        
                        </div>
                    </div>
                   <!-- </div> -->

               </div>

               <div class="card_content table_card">

                  <div class="chart_header">
                     <span style="font-size: .9em;"> ACTIVE NURSES TODAY </span>
                  </div>

                  <table>
                     <tr>
                        <!-- <th>Image</th> -->
                        <th>Emp ID</th>
                        <th>Fullname</th>
                        <th>Campus</th>
                        <!-- <th>Time</th> -->
                     </tr>

                      <?php
                           if ($fetchActiveNurses -> num_rows > 0){
                              while ($actNurse = $fetchActiveNurses -> fetch_assoc()){ ?>

                        
                     <tr>
                        <!-- <td><img src="./assets/nurse.jpg"></td> -->
                        <td><?=$actNurse['emp_id']?></td>
                        <td><?=$actNurse['firstname']?> <?=$actNurse['middlename']?> <?=$actNurse['lastname']?></td>
                        <td><?=$actNurse['campus']?></td>
                        <!-- <td><?=$actNurse['last_active']?></td> -->
                     </tr>
                     <?php } }?>

                     
                  </table>
               </div>
            </div>

            
         
         </div>

      </div>

            <!-- modal -->
            <div class="announce-modal-container" id="announce-modal-container">
            
            </div>


            <!-- message modal -->
            <div class="announce-message-modal" id="announce-message-modal">

            </div>

   </main>
   
</body>

<!-- charts -->
<script src="../js/line_graph.js"></script>
<script src="../js/circle_graph.js"></script>
<script src="../js/bar_graph.js"></script>

<!-- custom script -->
</html>