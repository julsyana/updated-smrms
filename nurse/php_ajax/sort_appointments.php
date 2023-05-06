<?php
  include "../includes/db_conn.php";

  $search = $_POST['search'];
  $sort = $_POST['sort'];

  $fetchAllApp = "SELECT *, a.app_status as `appointment_status` FROM `stud_appointment` a
  JOIN `mis.student_info` b
  ON a.student_id = b.student_id
  JOIN `appointment_dates` c
  ON a.app_date_id = c.app_date_id
  JOIN `appointment` d
  ON a.se_id = d.app_id
  WHERE a.app_status = 'scheduled'";

  switch ($sort){

    case "all":{
      $fetchAllApp .= "AND (";
      break;

    }

    default:{

      $fetchAllApp .= " AND a.se_id = '$sort' AND (";

    }
  }

  $fetchAllApp .= "a.`reference_no` LIKE '%$search%' OR a.`student_id` LIKE '%$search%' OR d.`app_type` LIKE '%$search%' OR b.`firstname` LIKE '%$search%' OR b.`lastname` LIKE '%$search%' OR b.`middlename` LIKE '%$search%'";
  
  $fetchAllApp .= ") ORDER BY c.app_dates ASC; ";

  // echo $fetchAllApp;
  
  // SELECT ALL STUDENTS 
  $fetchAllAppointments = mysqli_query($conn1, $fetchAllApp);

?>

<table class="table text-center table-borderless">
  
  <thead class="border-bottom border-2 rounded-2">
    <tr>
      <th scope="col">Student No.</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Date</th>
      <th scope="col">Reference No.</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>

    <a href="#" class="nav-link">

    <?php 
    
      if(mysqli_num_rows($fetchAllAppointments) > 0) { 

          while ($appoint = mysqli_fetch_assoc($fetchAllAppointments)) {  
            
            $appDateFormat = $appoint['app_dates'];
            $appDateFormat = new DateTime($appDateFormat);
            $appDateFormat = $appDateFormat->format("l, F d, Y");
            
          ?>

            <tr>        
              <!-- <td colspan="2"><img src="./assets/badang.JPG"  width="65" height="65" alt=""></td> -->
              <td> <?=$appoint['student_id']?> </td>
              <td> <?=$appoint['lastname']?>, <?=$appoint['firstname']?> <?=$appoint['middlename']?> </td>
              <td> <?=$appoint['app_type']?> </td>
              <td> <?=$appDateFormat?> </td>
              
              <td> <?=$appoint['reference_no']?> </td>

              <td>
                <label style="color: Green; font-weight: 500; text-transform: capitalize; ">
                  <?=$appoint['appointment_status']?>
                </label>
              </td>

              <td>



                <a href="#view" class="custom_btn" style="text-decoration: none; color: Blue;font-weight: bold;" data-toggle="modal" data-ref_no = "<?=$appoint['reference_no']?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="view_appointment">
                  View
                </a>
              </td>
              
            </tr>

          <?php 
        } 
      
      } else {

        ?>

        <tr> 

          <td colspan="7"> No Appointments today </td>

        </tr>

        <?php 

      } 

    ?>
    
  </tbody>

</table>

