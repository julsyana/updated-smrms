<?php
include('../includes/db_conn.php');
include('../includes/date.php');
session_start();


if (!isset($_SESSION['emp_id']) || !isset($_SESSION['username'])) {
  //redirect to login
  header("location: ../index.php");
}

$ref_no = $_GET['ref-no'];
$emp_id = $_SESSION['emp_id'];

// select nurse
$nurseQuery = "SELECT * FROM `nurses` WHERE `emp_id` = '$emp_id'";
$nurseResult = mysqli_query($conn1, $nurseQuery);
$nurse = mysqli_fetch_assoc($nurseResult);

// select student
$select = "SELECT *, LEFT(b.middlename, 1) as `mi`, b.firstname as `fname`, b.lastname as `lname` FROM `consultations` a
JOIN `mis.student_info` b
ON a.student_id = b.student_id
JOIN `nurses` c
ON a.emp_id = c.emp_id
WHERE a.reference_no = '$ref_no'";

$run_query = mysqli_query($conn1, $select) or die(mysqli_error($conn1));

if (mysqli_num_rows($run_query) === 1) {
  $row = mysqli_fetch_array($run_query);
  $student_id = $row["student_id"];
  $firstname = $row['fname'];
  $lastname = $row['lname'];
//   $middlename = $row['middlename'];
  $middleInitial = $row['mi'];


  $dateConsult = $row['date_of_consultation'];
  $dateConsult = new DateTime($dateConsult);
  $dateConsult = $dateConsult->format("l, F d, Y h:i A");

  $formatBDate = $row['birthdate'];
  $formatBDate = new DateTime($formatBDate);
  $formatBDate = $formatBDate->format("F d, Y");


  $dquery = mysqli_query($conn1, "SELECT * FROM `sample_stud_data` WHERE student_id = '$student_id'");
  $drow = $dquery->fetch_assoc();
}

$date_today = new DateTime($date_today);
$date_today = $date_today->format("F d, Y");

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
  <link rel="stylesheet" href="../css/consultation.css">
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

  <div class="container-fluid">

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
   
                  <li class="breadcrumb-item"> Student List </li>
                  <li class="breadcrumb-item active" aria-current="page">
                  <a href="./information.php?stud-id=<?= $student_id ?>"> <?= $firstname ?> <?= $lastname ?> </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"> New Consultation </li>
                  <li class="breadcrumb-item active" aria-current="page"> <b>   Excuse Slip </b></li>
   
               </ol>
   
            </nav>
   
   
            <div id="excuse-slip">
               <div class="excuse-slip-header">
                  <img src="../assets/header-report.png" alt="">
               </div>

               <div class="title-header">
                  <span> MEDICAL & DENTAL SERVICE </span>
                  <h1> EXCUSE SLIP </h1>
               </div>

               <div class="content">
                  <p> Date: <span style="text-decoration:underline; font-weight: 600;" > <?=$date_today?> </span></p>

                  <p> This is to certify that 
                     <span style="text-decoration:underline; font-weight: 600;" ><?=$firstname?> <?=$middleInitial?>. <?=$lastname?></span> 
                     with student number 
                     <span style="text-decoration:underline; font-weight: 600;" ><?=$row['student_id']?></span>
                     was seen and examined in the clinic on 
                     <span style="text-decoration:underline; font-weight: 600;"> <?=$row['campus']?> Campus</span> at 
                     <span style="text-decoration:underline; font-weight: 600;" ><?=$dateConsult?></span> with complaint of
                     <span style="text-decoration:underline; font-weight: 600;" > <?=$row['symptoms']?> </span>. </p>

                  <p> He/She was advised to; </p>

                  <form action="">

                     <div class="form-check">
                        <?php 

                           if($row['confined'] == 'yes'){
                              ?>
                                 <input type="radio" name="stay-home" id="stay-clinic" checked>

                              <?php 
                           } else {
                              ?>
                                 <input type="radio" name="" id="stay-clinic" disabled>
                              <?php 
                           }

                        ?>
                         <!-- <input type="checkbox" name="" id="stay-clinic"> -->
                         <label for="stay-clinic"> Stay in the clinic </label>
                     </div>

                     <div class="form-check">
                        <input type="radio" name="stay-home" id="go-home">
                        <label for="go-home"> Go home </label>

                        <div class="form-input">
                           <label for=""> Fetched by: </label>
                           <input type="text" name="" id="">
                        </div>
                        <div class="form-input">
                           <label for=""> Relationship: </label>
                           <input width="60%" type="text" name="" id="">
                        </div>
                       
                     </div>

                     <div class="form-check">
                        <?php 
                           if($row['referred'] == 'yes') {
                              ?> 
                              <input type="checkbox" name="" id="refer-hospital" checked> 
                              <label for="refer-hospital"> Refer to the hospital </label>

                              <div class="form-input">
                                 <label for=""> HOC: </label>
                                 <input type="text" value="<?=$row['hospital']?>" name="" id="hospital" readonly>
                              </div>

                              <?php 
                           } else {
                              ?> 

                              <input type="checkbox" name="" id="refer-hospital" disabled> 
                              <label for="refer-hospital"> Refer to the hospital </label>

                                 
                              <div class="form-input">
                                 <label for=""> HOC: </label>
                                 <input type="text" readonly>
                              </div>

                              <?php 
                           }
                        ?>
                        
                     

                     </div>
                  </form>


                  <div class="excuse-footer">
                     <p> Nurse on duty: <span style="text-decoration:underline; font-weight: 600;"> <?=$row['firstname']?> <?=$row['middlename']?> <?=$row['lastname']?> </span> </p>
                  </div>

               </div>

             
            </div>

            <div class="form-button">
               <button> Send </button>
            </div>
            
              
         </div>
         
      </div>

    </div>

  </div>
      
</body>


<!-- custom ajax script -->
<script>
  $(document).ready(function() {

    $('#other').change(function(){
      
      let other = document.getElementById('other').checked;
      
      if(other){

        $('#otherSymptoms').attr('disabled', false);

      } else {

        $('#otherSymptoms').attr('disabled', true);
      }

    });
    
      
    // if confined enable how long input
    let confined = $('input[name=confined]');

    confined.click(function(){

      let isConfined = $(this).val();
      
      if(isConfined == 'yes'){

        $('#how_long').attr('disabled', false);

      } else {
        $('#how_long').attr('disabled', true);
      }

    });


    // if referred enable how hospital selection
    let referred = $('input[name=referred]');
    
    referred.click(function(){

      let isReferred = $(this).val();
      
      if(isReferred == 'yes'){

        $('#hospital').attr('disabled', false);

      } else {
        $('#hospital').attr('disabled', true);
      }

    });


    // check hospital
    $('#hospital').change(function(){

      let hospi_id = $(this).val();

      $("#hospital-list").load('../ajax/view/hospital.php', {
        hospi_id: hospi_id, 
      });

    });



    $("#medical-content").load('../ajax/view/med_history.php?stud_id=<?= $student_id ?>');

    $('#consultation-form').submit(function(e){

      e.preventDefault();

      const form = $('#consultation-form')[0];
      const formData = new FormData(form);

      $.ajax({
        type: "POST",
        url: "../process/consultation.php",
        data: formData,
        cache: false,
        contentType: false, 
        processData: false,
        
        success: function(data){
          $('#sample-mess').html(data);
        }

      });

    })

  });
</script>


<!-- CUSTOM AJAX FILE -->

</html>