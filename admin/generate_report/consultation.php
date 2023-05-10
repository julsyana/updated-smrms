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
   
   

   $range = $_GET['range'];

   $query = "SELECT *, LEFT(b.middlename, 1) as mi, b.firstname as s_fname, b.lastname as s_lname, b.gender as s_gender FROM consultations a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   JOIN nurses d
   ON a.emp_id = d.emp_id";

   switch ($range){
      case "monthly": {

         $fromDate = date('Y-m-d', strtotime('-30 days'));
         $today = date("Y-m-d");

         $query .= " AND DATE(a.date_of_consultation) BETWEEN '$fromDate' AND '$today'";
         break;
      }

      case "yearly": {
         $fromDate = date('Y-m-d', strtotime('-365 days'));
         $today = date("Y-m-d");

         $query .= " AND DATE(a.date_of_consultation) BETWEEN '$fromDate' AND '$today'";
         break;
      }
   }

   $query .= " ORDER BY a.date_of_consultation DESC";
   
   $stud_app = mysqli_query($conn, $query);

   $formatFromDate = new DateTime($fromDate);
   $formatFromDate = $formatFromDate->format("F d, Y");

   $formatToDate = new DateTime($today);
   $formatToDate = $formatToDate->format("F d, Y");

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Consultation Report <?=date("Y")?></title>
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
         <h2> Consultation report  </h2>
         <span> from <?=$formatFromDate?> to <?=$formatToDate?> </span>
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
            <th> Patient's Complain </th>
            <th> Medicine Given </th>
            <th> Quantity </th>
            <th> Nurse Assisted </th>
            <th> Campus </th>
            <th> Date of Consultation </th>
            <!-- <th> Remarks </th> -->
         </tr>
      </thead>

      <tbody>
         <?php 
            if(mysqli_num_rows($stud_app) > 0){
               
               $cnt = 1;

               while($row = mysqli_fetch_assoc($stud_app)){

                  ?>
                  
                     <tr> 
                        <td> <?=$cnt?> </td>
                        <td> <?=$row['s_lname']?>, <?=$row['s_fname']?> <?=$row['mi']?>.  </td>
                        <td> <?=$row['s_gender']?> </td>
                        <td> <?=$row['code']?> </td>
                        <td> <?=$row['section']?> </td>
                        <td> <?=$row['symptoms']?></td>
                        <td> <?=$row['medicine']?> </td>
                        <td> <?=$row['quantity']?> </td>
                        <td> <?=$row['firstname']?> <?=$row['lastname']?>, RN </td>
                        <td> <?=$row['branch']?> </td>
                        <td> <?=$row['date_of_consultation']?> </td>
                        
                        <!-- <td style="text-transform: capitalize"> <?=$row['app_status']?> </td> -->
                     </tr>
                  
                  
                     <?php

                     $cnt++;



               }

            } else {

            }
         ?>
         
      </tbody>
   </table>
</div>



</div>
</main>

<footer>
   <p style="display: flex; float: left;"> Generate by: <b><?=$admin_logged['fname']?> <?=$admin_logged['lname']?></b></p>
   <p style="display: flex; float: right;"> Date generate: <b><?=$formatToDate?> </b> </p>
</footer>

</body>
</html>
               
