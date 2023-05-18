<?php
   include "./includes/db_conn.php";
   include "./functions/report.php";
   include "./functions/admin.php";
   include "./includes/date.php";
   session_start();
   
   $id = $_SESSION['user_id'];
   $admin_logged_res = fetchAdmin($conn, $id);
   $admin_logged = mysqli_fetch_assoc($admin_logged_res);

   // image
   $qcu_png = file_get_contents("./assets/header-report.png");
   $qcu_base64 = base64_encode($qcu_png);
   

   $rangeStart = $_GET['start'];
   $rangeEnd = $_GET['end'];


   $query = "SELECT *, LEFT(b.middlename, 1) as `mi` FROM `stud_appointment` a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   JOIN `appointment_dates` d
   ON a.app_date_id = d.app_date_id
   JOIN `appointment` e
   ON a.se_id = e.app_id
   WHERE a.app_status = 'attended' AND DATE(d.app_dates) BETWEEN '$rangeStart' AND '$rangeEnd'
   ORDER BY a.id DESC";



   $stud_app = mysqli_query($conn, $query);

   $date_today = new DateTime($date_today);
   $date_today = $date_today->format("F d, Y h:i A");

   function formatDate($date, $format){
      $date = new DateTime($date);
      $date = $date->format("$format");

      return $date;
   }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Appointment Report <?=date("Y")?> </title>
</head>

<style>
   *{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      
   }
   header{
      margin-bottom: 10px;
      height: 10vh;
   }

   header > div {
      text-align: center;
      width: 100%;
      height: 10vh;
   }

   header > div > img{
      width: 100%;
      object-fit: cover;
   }

   main .report-header{
      text-align: center;
      line-height: 5px;
      text-transform: capitalize;
      margin-bottom: 20px;
   }

   main table{
      width: 100%;
      border-collapse: collapse;
   
   }

   main table thead th{
      padding: 5px;
      background-color: #E9E9E9;
      font-size: .9em;
      border-bottom: 1px solid #c1c1c1;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   }
   
   main table tbody tr td{
      /* border-bottom: 1px solid #E9E9E9; */
      padding: 10px;
      font-size: .8em;
      text-align: center;
      border: 1px solid #0004;
   }

   main table tbody tr:nth-child(even){
      background-color: #E9E9E9;
   }
</style>

<body>

   <header>
      
      <div class="qcu-logo">
         <img src='data:image;base64, <?=$qcu_base64?>'>
      </div>
   </header>
      

<main>
  
   <div class="report-box">
        
       

        <div class="report-header">
             <p style="margin: 0 0 20px 0;"> MEDICAL AND DENTAL SERVICES  </p>
             <br>
             <h2> Appointments report  </h2>
             <p>   
               <?php 
            
                  if($rangeStart == $rangeEnd){

                     $range = $rangeStart;

                     ?> From <?=formatDate($range, "F d, Y");?> <?php 

                  } else {
                     ?> from <b><?=formatDate($rangeStart, "F d, Y");?></b> to <b><?=formatDate($rangeEnd, "F d, Y");?></b> <?php 
                  }
               ?>
            </p>
         
            
             <div>
                <p style="display: flex; float: left;"> Generate by: <b><?=$admin_logged['fname']?> <?=$admin_logged['lname']?></b></p>
                <p style="display: flex; float: right;"> Date generate: <b><?=$date_today?> </b> </p>
            </div>
             <br>
             <br><br><br>
         
        </div>
      
      

      <div class="list-of-data-tbl">
          
        
         
         <table border="0">
            <thead>
               <tr> 
                  <th> No. </th>
                  <th> Student Name </th>
                  <th> Gender </th>
                  <th> Course </th>
                  <th> Section </th>
                  <th> Appointment type </th>
                  <th> Date of appointment </th>
                  <th> Campus </th>
                  <th> Date applied </th>
               </tr>
            </thead>

            <tbody>
               <?php 
                  if(mysqli_num_rows($stud_app) > 0){
                     $count = 1;
                     while($row = mysqli_fetch_assoc($stud_app)){

                        $app_dates = $row['app_dates'];
                        $app_dates = new DateTime($app_dates);
                        $app_dates = $app_dates->format("F d, Y");

                        $dateApply = $row['date_apply'];
                        $dateApply = new DateTime($dateApply);
                        $dateApply = $dateApply->format("F d, Y");

                        ?>
                        
                           <tr> 
                              <td> <?=$count?></td>
                              <td> <?=$row['lastname']?>, <?=$row['firstname']?> <?=$row['mi']?>.  </td>
                              <td> <?=$row['gender']?> </td>
                              <td> <?=$row['code']?> </td>
                              <td> <?=$row['section']?> </td>
                              <td> <?=$row['app_type']?> Service </td>
                              <td> <?=$app_dates?> </td>
                              <td> <?=$row['branch']?> </td>
                              <td> <?=$dateApply?> </td>
                           </tr>
                        
                        
                        <?php
                        $count++;


                     }

                  } else {

                  }
               ?>
               
            </tbody>
         </table>
      </div>

   </div>
</main>

<!--<footer>-->
<!--   <p style="display: flex; float: left;"> Generate by: <b><?=$admin_logged['fname']?> <?=$admin_logged['lname']?></b></p>-->
<!--   <p style="display: flex; float: right;"> Date generate: <b><?=$formatToDate?> </b> </p>-->
<!--</footer>-->

</body>
</html>
               
