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
   
   

   // $range = $_GET['range'];
   $rangeStart = $_GET['start'];
   $rangeEnd = $_GET['end'];


   $query = "SELECT DISTINCT(name), expirationDate, `date_added` FROM `medicine` 
   WHERE DATE(date_added) BETWEEN '$rangeStart' AND '$rangeEnd'
   ORDER BY `expirationDate` ASC";

   // switch ($range){
   //    case "monthly": {

   //       $fromDate = date('Y-m-d', strtotime('-30 days'));
   //       $today = date("Y-m-d");
         
   //       $title = "Monthly";
   //       $query .= " DATE(date_added) BETWEEN '$fromDate' AND '$today'";

   //       break;
   //    }

   //    case "yearly": {
   //       $fromDate = date('Y-m-d', strtotime('-365 days'));
   //       $today = date("Y-m-d");
         
   //       $title = "Yearly";

   //       $query .= " DATE(date_added) BETWEEN '$fromDate' AND '$today'";
   //       break;
   //    }
   // }

   // $query .= " ORDER BY `expirationDate` ASC";

   $medicineRes =  mysqli_query($conn, $query);

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
   <title> Medicine Report <?=date("Y")?> </title>
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
             <h2> Medicine Report  </h2>
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

      <div class="list-of-data-tbl" id="divToPrint">
         
         <table border="0">
            <thead>
                <tr> 
                   <th> No. </th>
                   <th width="20%"> Medicine/Supply </th>
                   <th width="15%"> Expiration Date </th>
                   <th> SB (San Bartolome) </th>
                   <th> BAT (Batasan) </th>
                   <th> SF (San Fransisco)  </th>
                   <th> Total Quantity</th>
                   <th> Medicine Given </th>
                   <th> Remaining </th>
                   <th width="15%"> Date added </th>
                </tr>
            </thead>
      
            <tbody>
               <?php 
                  if(mysqli_num_rows($medicineRes) > 0){
                     $count = 1;
                     while($row = mysqli_fetch_assoc($medicineRes)){
      
                        
                        $totalQty = totalQty($conn, $row['name']);
      
                        $dateAdded = $row['date_added'];
                        $dateAdded = new DateTime($dateAdded);
                        $dateAdded = $dateAdded->format('F d, Y');
      
                        $expDate = $row['expirationDate'];
                        $expDate = new DateTime($expDate);
                        $expDate = $expDate->format('F d, Y');
                        
      
                        ?>
                        
                        <tr> 
                            <td> <?=$count?></td>
                            <td> <span style="font-size: .9em;"> <?=$row['name']?> </span> </td>
                            <td> <?=$expDate?></td>
                            <td> 
                            
                                <?php if(empty($totalQty['sanBartolome'])){
                                    
                                    echo "0";
                                
                                } else { ?>
                                
                                    <?=$totalQty['rSB']?>
                                
                                <?php }
                                
                                ?>
                               
                                
                            </td>
                            
                            <td>
                                
                                <?php if(empty($totalQty['batasan'])){
                                    
                                    echo "0";
                                
                                } else { ?>
                                
                                    <?=$totalQty['rBAT']?>
                                    
                                <?php }
                                
                                ?>
                               
                            </td>
                            
                            <td> 
                            
                                <?php if(empty($totalQty['sanFrancisco'])){
                                    
                                   echo "0";
                                
                                } else { ?>
                                
                                     <?=$totalQty['rSF']?>
                                    
                                <?php }
                                
                                ?>
                               
                            </td>
                           
                           <td> <?=$totalQty['total']?> </td>
                           <td> <?=$totalQty['totalUsed']?> </td>
                           <td> <?=$totalQty['remaining']?></td>
                           
                           <td style="text-transform: capitalize"> <?=$dateAdded?> </td>
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
<!--   <p style="display: flex; float: right;"> Date generate: <b><?=$date_today?> </b> </p>-->
<!--</footer>-->

</body>
</html>
               
