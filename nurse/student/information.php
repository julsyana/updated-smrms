<?php
include('../includes/db_conn.php');
session_start();


if (!isset($_SESSION['emp_id'])) {
  //redirect to login
  header("location: ../index.php");
}

$studID = $_GET['stud-id'];

// select student
$select = "SELECT *, LEFT(`mis.student_info`.middlename, 1) as `mi` FROM `student_account`
JOIN `mis.student_info` ON `student_account`.`student_id` = `mis.student_info`.`student_id`
JOIN `mis.enrollment_status` ON `mis.student_info`.`student_id` = `mis.enrollment_status`.`student_id` 
JOIN `mis.student_address` ON `mis.enrollment_status`.`student_id` = `mis.student_address`.`student_id` 
JOIN `mis.emergency_contact` ON `mis.student_address`.`student_id` = `mis.emergency_contact`.`student_id` WHERE `student_account`.`student_id` = '$studID'";

$run_query = mysqli_query($conn1,$select) or die(mysqli_error($conn1));

if(mysqli_num_rows($run_query) === 1){
   $row = mysqli_fetch_array($run_query);
   $student_id = $row["student_id"];
   $firstname = $row['firstname'];
   $lastname = $row['lastname'];
   $middlename = $row['middlename'];
   $middleInitial = $row['mi'];
   $section = $row['section'];

   $formatBDate = $row['birthdate'];
   $formatBDate = new DateTime($formatBDate);
   $formatBDate = $formatBDate->format("F d, Y");


   $dquery = mysqli_query($conn1,"SELECT * FROM `sample_stud_data` WHERE student_id = '$student_id'");
   $drow = $dquery->fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/favcon.png" />
  <title>SMRMS | NURSE | Students</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="../css/patients.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <script defer src="../ajax/action.js"></script>

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
   
   <div class="container-fluid" style="overflow: hidden; background: red;">
      
      <nav class="row">
   
        <div class="py-2 px-3 d-flex justify-content-between align-items-center" style="background-color:#134E8E;">
          <div class="logo navbar-brand" href="#">
    
            <img src="../assets/QCUClinicLogo.png" width="50" height="50" alt="" />
    
            <span class="fw-regular fs-4 text-light">Student Medical Record</span>
    
          </div>
          
          <div class="container-fluid d-flex justify-content-start">
   
            <button id="sidebarCollapse" class="navbar-toggle border-0 bg-dark ms-0 ms-md-2 ms-lg-0 order-1 order-md-1">
              <span class="navbar-toggler-icon"></span>
            </button>
   
            <div class="ms-auto order-sm-0" id="navbarNav">
              <ul class="navbar-nav ms-auto text-white d-flex align-items-left align-items-lg-center">
   
                <span></span>
   
                <li class="nav-item px-0 mx-2 d-flex align-items-center">
                  <a class="nav-link" href="../logout.php">Logout</a>
                </li>
   
              </ul>
   
            </div>
   
          </div>
        
        </div>
   
      </nav>
    
      
      <div class="row bg-secondary-subtle">
         
         <div class="col-md-2 p-0 position-relative" style="min-height:100vh;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;background: #134E8E;">
   
            <div class="w-100">
   
               <ul class="mt-4 list-unstyled navbar-nav ps-0 ">
   
                  <li class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="../dashboard.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-area-chart mx-2"></i><span>Home</span></span></a>
                  </li>
   
                  <li class="px-4 w-100 mb-1 nav-item active tab py-2">
                  <a href="../student.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-users mx-2"></i><span>Students</span></span></a>
                  </li>
   
                  <li class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="../Mreport.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-plus-square mx-2"></i><span>Medical Requirements</span></span></a>
                  </li>
               
                  <li class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="../appointment.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-calendar mx-2" aria-hidden="true"></i><span>Appointments</span></span></a>
                  </li>
   
                  <li class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="../medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
                  </li>
               
                  <li id="account_btn" class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="../account.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-user-o mx-2" aria-hidden="true"></i><span> Manage Account</span></span></a>
                  </li>
                  
               </ul>
   
            </div>
            
         </div>
   
   
   
         <div class="col-sm-10 p-4" id="student">
   
            <div class="container-fluid">
   
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="../student.php"><i class="fa-solid fa-arrow-left mx-2"></i>Student List</a></li>
                     <li class="breadcrumb-item active" aria-current="page"> <?=$firstname?> <?=$lastname?></li>
                  </ol>
               </nav>
              
               <hr class="border-2">
   
               <div class="row shadow rounded-3">
   
                  <div class="col-md-4 d-grid text-center position-relative align-items-center justify-content-center p-4 m-auto border-end border-2">
   
                     <div class="mb-2 stud-profile">

                        <div class="img-handler">
                           
                           <img src="../assets/<?=$row['id_image']?>">

                        </div>

   
                     </div>
                     
                     <h5 class="mb-2"> <?=$lastname?>, <?=$firstname?> <?=$middleInitial?>. </h5>
                     
                     <p class="mb-2"> <?=$row['email']?> </p>
    
                     <p class="mb-2"> <?=$row['section']?> </p>
    
                     <p class="mb-2"> <?=$row['student_id']?> </p>
    
                     <p class="mb-2"> Medical Requirements: 
                    
                        <span class="text-success">
                           <div class="sample-output"> </div> 
                        </span>
   
                     </p>
   
                     <p class="mb-2"> Status: 
   
                           <?php 

                              if(strtolower($drow['Status']) == 'cleared'){
                                 ?>
                              
                                    <span id="change_status" style="color: green;"> 
                                       <?=$drow['Status']?> 
                                    </span>
                              
                                    
                                 <?php 
                              } else {
                                 ?>
                                 
                                    <span  id="change_status" style="color: red;"> 
                                       <?=$drow['Status']?>
                                    </span>
                                    
                                 <?php 
                              }
                           ?>
                       

   
                          
   
   
                     </p>
   
                  </div>
                  
                  <div class="col-md-8 px-5 py-4">
                     
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
   
                        <span c lass="fw-semibold"> Sex:</span>
   
                        <span> <?=$row['gender']?> </span>
   
                     </div>
                     
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
   
                        <span class="fw-semibold">Age:</span>
                        <span> <?=$row['age']?> </span>
   
                     </div>
                     
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
   
                        <span class="fw-semibold"> Date of Birth:</span>
   
                        <span> <?=$formatBDate?> </span>
   
                     </div>
                     
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
                        <span class="fw-semibold">Contact Number:</span>
                        <span> <?=$row['contact_number']?> </span>
                     </div>
   
                     <div class="mb-2 d-flex justify-content-between">
   
                        <span class="fw-semibold">Complete Address:</span>
   
                        <span class="text-wrap"> <?=$row['house_no']?> <?=$row['street']?>, <?=$row['brgy']?>, <?=$row['city']?>, <?=$row['province']?> </span>
   
                     </div>
   
                     <hr>
   
                     <p class="fw-bold mb-2 text-center">EMERGENCY</p>
                     
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
   
                        <span class="fw-semibold">Contact: Person</span>
   
                        <span> <?=$row['fullname']?> </span>
                     
                     </div>
                
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
   
                        <span class="fw-semibold">Contact Number:</span>
   
                        <span> <?=$row['emergency_contact']?> </span>
                     </div>
   
                     <div class="mb-2 d-flex flex-wrap justify-content-between">
   
                        <span class="fw-semibold">Relationship:</span>
   
                        <span> <?=$row['relation']?> </span>
   
                     </div>
                
                     <div class="mb-2 d-flex flex justify-content-between">
                        <span class="fw-semibold"> Complete Address: </span>
                        <span> <?=$row['address']?> </span>
                     </div>
                     
                  </div>
                  
               </div>
               
               <div class="row mt-4 justify-content-between gap-4">
                
                  <div class="container-fluid d-flex justify-content-end">

                     <a href="./student-consultation.php?stud-id=<?=$student_id?>" class="btn px-2 text-light d-flex justify-content-end" style="background: #0C4079;width:max-content;"> New Consultation </a>
   
                     <!-- <input type="button" class="btn px-2 text-light d-flex justify-content-end" style="background: #0C4079;width:max-content;" id="consultation" value="New Consultation" data-id="<?=$student_id?>"> -->
   
                  </div>
   
                  <div class="shadow rounded-3 position-relative"  >
                     
                     <div class="d-flex justify-content-between align-items-center my-2 ">
   
                        <div class="d-flex" id="input_button fs-6">
                           
                           <input type="button" class="btn btn-light px-2 mx-1 student_input_button active" data-id="<?=$student_id?>" id="med-his" value="Medical History">
   
                           <input type="button" class="btn btn-light px-2 mx-1 student_input_button" id="med-req" data-id="<?=$student_id?>"   value="Medical Requirements">
   
                           <input type="button" class="btn btn-light px-2 mx-1 student_input_button" id="health-his" data-id="<?=$student_id?>"   value="Health History">
   
                           <input type="button" class="btn btn-light px-2 mx-1 student_input_button" id="family-his" data-id="<?=$student_id?>"   value="Family History">
   
                           <input type="button" class="btn btn-light px-2 mx-1 student_input_button" id="covac-info" data-id="<?=$student_id?>" value="COVID-19 Vaccine Information">
                        
                        </div>
                     
                     </div>
   
                     <div class="p-3 overflow-y-scroll bg-body-secondary rounded-3 mb-3" id="medical-content" style="max-height: 20rem;min-height:20rem;">
                        
                     </div>
                     
                  </div>
                  
               </div>
               
            </div>
               
         </div>
            
      </div>
      
   </div>

</body>


<!-- custom ajax script -->
<script>
   $(document).ready(function(){

      $("#medical-content").load('../ajax/view/med_history.php?stud_id=<?=$student_id?>');


   });
</script>


<!-- CUSTOM AJAX FILE -->

</html>