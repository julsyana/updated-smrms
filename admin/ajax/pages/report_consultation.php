<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";


   // select all student appointment
   $stud_app = fetchConsult($conn);

   // $total_medical = totalService($conn, "Medical");
   // $total_dental = totalService($conn, "Dental");


?>

               <div class="report-box">

                  <div class="report-header">
                     <h2> Students consultation report </h2>
                  </div>


                  <!-- <div class="graphical-data" id="graphical-data">
                     <div class="graph">
                        <div class="graph-title">
                           <h3> total number of appointments </h3>
                        </div>
                        
                        <div class="line-graph">
                           <canvas class="con-lineGraph"></canvas>
                        </div>

                        

                     </div>

                     <div class="graph">
                        <div class="graph-title">
                           <h3> services </h3>
                        </div>

                        <div class="pie-chart">
                           <canvas class="con-pieChart"></canvas>
                        </div>
                     </div>
                  </div> -->

                  <div class="list-of-data-tbl" id="divToPrint">
                     
                     <table border="0">
                        <thead>
                           <tr> 
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
                                 while($row = mysqli_fetch_assoc($stud_app)){

                                    // $app_date = $row['app_date'];
                                    // $app_date = new DateTime($app_date);
                                    // $app_date = $app_date->format("F d, Y");

                                    ?>
                                    
                                       <tr> 
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


                                 }

                              } else {

                              }
                           ?>
                           
                        </tbody>
                     </table>
                  </div>

               

               </div>

               <div class="form-button">
                  <button id="printAppointment" onclick="PrintDiv();"> <i class="fas fa-print"></i> Print </button> 
                  or 
                  <a href="#"> <i class="fa fa-download" aria-hidden="true"></i> Download </a>
               </div>

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>


<!-- charts -->
<?php
   include "../../js/charts/line-chart.php";
   include "../../js/charts/pie-chart.php";
?>