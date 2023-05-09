<?php
  session_start();

  if (!isset($_SESSION['emp_id']) || !isset($_SESSION['username'])) {
    //redirect to login
    header("location: index.php");
  }


?>


<?php

include('./includes/db_conn.php');

    // SELECT ALL STUDENTS 
    $fetchAllAppointments = mysqli_query($conn1, "SELECT *, a.app_status as `appointment_status` FROM `stud_appointment` a
    JOIN `mis.student_info` b
    ON a.student_id = b.student_id
    JOIN `appointment_dates` c
    ON a.app_date_id = c.app_date_id
    JOIN `appointment` d
    ON a.se_id = d.app_id
    WHERE a.app_status = 'scheduled' AND c.app_dates = CURDATE()
    ORDER BY a.date_apply DESC;");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assets/favcon.png" />
  <title>SMRMS | NURSE | Appointment</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./css/patients.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="./ajax/action.js" defer></script>

</head>

<style>
  #account_btn:hover .submenu {
    display: block;
  }

  .submenu {
    list-style-type: none;
    padding: 0;
    margin: 0;
    min-width: 150px;
    display: none;
  }

  .submenu li a {
    color: #000;
    /* You can adjust the text color as needed */
    text-decoration: none;
    display: block;
    padding: 10px;
  }

  .submenu li a:hover {
    color: #007bff;
    /* You can adjust the hover text color as needed */
    background-color: #f8f9fa;
    /* You can adjust the hover background color as needed */
  }
</style>

<body>

  <div class="container-fluid" style="background-color: red;">
    
    <!-- header -->
    <nav class="row">

      <div class="py-2 px-3 d-flex justify-content-between align-items-center" style="background-color:#134E8E;">
          
        <div class="logo navbar-brand" href="#">
          <img src="./assets/QCUClinicLogo.png" width="50" height="50" alt="" />
          <span class="fw-regular fs-4 text-light">Student Medical Record</span>
        </div>
        
        <div class="container-fluid d-flex justify-content-start">

          <button
            id="sidebarCollapse"
            class="navbar-toggle border-0 bg-dark ms-0 ms-md-2 ms-lg-0 order-1 order-md-1"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="ms-auto order-sm-0" id="navbarNav">

            <ul class="navbar-nav ms-auto text-white d-flex align-items-left align-items-lg-center">

              <span></span>

              <li class="nav-item px-2 mx-2 d-flex align-items-center">

                <a class="nav-link" href="logout.php">Logout</a>

              </li>
             
            </ul>

          </div>

        </div>


      </div>

    </nav>


    <!-- main container -->
    
    <div class="row bg-light" style="overflow: hidden;">


      <!-- side panel -->
          
      <div class="col-md-2 p-0 position-relative" style="min-height:100vh;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;background: #134E8E;" id="top">

        <div class="w-100">
          
          <ul class="mt-4 list-unstyled navbar-nav ps-0 ">
            
            <li  class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="dashboard.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-area-chart mx-2"></i><span>Home</span></span></a>
            </li>
  
            <li  class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="student.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-users mx-2"></i><span>Students</span></span></a>
            </li>
  
            <li  class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="Mreport.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-plus-square mx-2"></i><span>Medical Requirements</span></span></a>
            </li>
            
            <li class="px-4 w-100 mb-1 nav-item active tab py-2">
              <a href="appointment.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-calendar mx-2" aria-hidden="true"></i><span>Appointments</span></span></a>
            </li>
  
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
            </li>
  
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="Report.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-book mx-2"></i><span>Reports</span></span></a>
            </li>
  
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="activityLog.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-history mx-2"></i><span>Activity Log</span></span></a>
            </li>
            
            <li id="account_btn" class="px-4 w-100 mb-1 nav-item tab py-2 position-relative">
  
              <div class="nav-link">
                <span class="fx-5 fw-800 text-light">
                  <i class="fa fa-user-o mx-2" aria-hidden="true"></i>
                  <span>Manage Account</span>
                </span>
              </div>
  
              <ul class="submenu position-absolute bg-white">
                
                <li><a href="account.php" class="dropdown-item">Profile</a></li>
  
                <li><a href="change_password.php" class="dropdown-item">Change Password</a></li>
  
              </ul>
  
            </li>
  
          </ul>
          
        </div>
        
      </div>

      <!-- main content -->

      <div class="col-sm-10 p-3">

        <div class="container-fluid">
          
          <div class="container-fluid bg-secondary-subtle py-2 rounded-1">

            <!--  main title with sort and search -->

            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 bg-body-secondary p-2 rounded-2">

              <span class="fw-bold fs-5 text-uppercase"> APPOINTMENTS TODAY <span class="sample"> </span></span>

              <div class="d-flex gap-2 ">

                <div class="d-flex align-items-center" style="flex-basis:300px">

                  <span for="#sort" class="px-2 text-nowrap">Sort By</span>

                  <select class="form-select shadow-none" aria-label="Default select example" name="sort" id="sort_app">

                    <option name="sort" value="all">All Services</option>

                    <?php
                      $allServices = mysqli_query($conn1, "SELECT * FROM `appointment`");

                      if(mysqli_num_rows($allServices) > 0){
                        while($se = mysqli_fetch_assoc($allServices)){

                          ?>

                          <option name="sort" value="<?=$se['app_id']?>"> <?=$se['app_type']?> </option>

                          <?php 

                        }
                      }
                    ?>

                   
                    
                  </select>
                  
                </div>

                <div class="input-group form-input-sm d-flex align-items-center gap-2 ">

                    <input type="text" class="form-control w-50 shadow-none" name="search" id="search_app" placeholder="&#xF002; Search..." aria-label="Search..." aria-describedby="button-addon2" style="font-family:Poppins, FontAwesome">
                    
                    
                    <a href="#" class="text-secondary"><i class="fa fa-bars mx-1 fs-3" aria-hidden="true"></i></a>

                </div>

              </div>
              
            </div>


            <!-- content here... -->
            
            <div class="p-3 mt-3 shadow" style="height: 70vh; overflow: hidden; overflow-y: scroll;">
              
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

              <div class="modal fade" id="staticBackdrop" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

                  <div class="modal-content" id="appointment_content"> </div>

                </div>

              </div>
              
            </div>                          
            
          </div>
          
          <div class="position-fixed bottom-0 end-0 m-3 px-3 py-2 rounded-circle"  style="background-color:#134E8E;">
            <a href="#top"><i class="fa-solid fa-arrow-up fs-3 text-light"></i></a>
          </div>

        </div>
      </div>
    </div>

  </div>
    

</body>
  
<script>
 
</script>


<!-- CUSTOM AJAX FILE -->
<script src="./ajax/search_appointments.js"> </script>

</html>