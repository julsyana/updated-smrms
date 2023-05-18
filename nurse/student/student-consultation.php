<?php
include('../includes/db_conn.php');
include('../includes/date.php');
session_start();



if (!isset($_SESSION['emp_id'])) {
  //redirect to login
  header("location: ../index.php");
}

$studID = $_GET['stud-id'];
$emp_id = $_SESSION['emp_id'];

// select student
$select = "SELECT *, LEFT(`mis.student_info`.middlename, 1) as `mi` FROM `student_account`
JOIN `mis.student_info` ON `student_account`.`student_id` = `mis.student_info`.`student_id`
JOIN `mis.enrollment_status` ON `mis.student_info`.`student_id` = `mis.enrollment_status`.`student_id` 
JOIN `mis.student_address` ON `mis.enrollment_status`.`student_id` = `mis.student_address`.`student_id` 
JOIN `mis.emergency_contact` ON `mis.student_address`.`student_id` = `mis.emergency_contact`.`student_id` WHERE `student_account`.`student_id` = '$studID'";


$run_query = mysqli_query($conn1, $select) or die(mysqli_error($conn1));

if (mysqli_num_rows($run_query) === 1) {
  $row = mysqli_fetch_array($run_query);
  $student_id = $row["student_id"];
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $middlename = $row['middlename'];
  $middleInitial = $row['mi'];
  $section = $row['section'];
  $program = $row['code'];

  $formatBDate = $row['birthdate'];
  $formatBDate = new DateTime($formatBDate);
  $formatBDate = $formatBDate->format("F d, Y");


  $dquery = mysqli_query($conn1, "SELECT * FROM `sample_stud_data` WHERE student_id = '$student_id'");
  $drow = $dquery->fetch_assoc();

  $depRes = mysqli_query($conn1, "SELECT * FROM `departments` WHERE `dept_name` = '$program'");
  $dept = $depRes->fetch_assoc();

  $deptEmail = $dept['email'];

}


$date_today = new DateTime($date_today);
$date_today = $date_today->format('l, F d, Y');


$nurse = mysqli_query($conn1, "SELECT * FROM `nurses` WHERE `emp_id` = '$emp_id'");
$nurse_logged = mysqli_fetch_assoc($nurse);

$nurseCampus = $nurse_logged['campus'];

$hosquery = "SELECT * FROM hospitals";
$hos = mysqli_query($conn1, $hosquery) or die(mysqli_error($conn1));


$medquery = "SELECT * FROM `medicine` WHERE `campus` = '$nurseCampus' AND `isArchive` = 0";
$medicine = mysqli_query($conn1, $medquery) or die(mysqli_error($conn1));


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
              <a href="Mreport.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-plus-square mx-2"></i><span>Medical Requirements</span></span></a>
            </li>

            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="../appointment.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-calendar mx-2" aria-hidden="true"></i><span>Appointments</span></span></a>
            </li>

            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="../medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
            </li>

            <li id="account_btn" class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="../account.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-user-o mx-2" aria-hidden="true"></i><span> Manage Account </span></span></a>
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

            </ol>

          </nav>


          <div id="consultation">

            <div class="consultation-header">
              <div class="consult-text">
                <p> Name: <span> Balingasa, Juliana Young </span> </p>

              </div>

              <div class="consult-text">
                <p> Section & Year: <span> SBIT-4E </span> </p>

              </div>

              <div class="consult-text">
                <p> Date today: <span> <?=$date_today?> </span> </p>

              </div>
            </div>

            <form id="consultation-form">

              <input type="hidden" value="<?=$student_id?>" name="stud_id">

              <div class="consultation-content">
  
                <div class="row px-5 py-4 ">
  
                  <div class="col-md-6">
  
                    <h6 class="fw-bold mb-3">Symptoms</h6>
  
                    <div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
  
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="breathing" type="checkbox" name="symptoms[]" value="Difficulty breathing">
  
                        <label for="breathing"> Difficulty breathing </label>
  
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
  
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="vommitting" type="checkbox" name="symptoms[]" value="Nausea or vomitting">
  
                        <label for="vommitting">Nausea or vomitting</label>
  
                      </div>
  
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
  
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="fever" type="checkbox" name="symptoms[]" value="Fever or chills">
  
                        <label for="fever">Fever or chills</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="cough" type="checkbox" name="symptoms[]" value="Cough">
                        <label for="cough">Cough</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="Headache" type="checkbox" name="symptoms[]" value="Headache">
                        <label for="Headache">Headache</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="congestion" type="checkbox" name="symptoms[]" value="Congestion or runny nose">
                        <label for="congestion">Congestion or runny nose</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="sore" type="checkbox" name="symptoms[]" value="Sore throat">
                        <label for="sore">Sore throat</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="taste" type="checkbox" name="symptoms[]" value="New loss of taste or smell">
                        <label for="taste">New loss of taste or smell</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="ache" type="checkbox" name="symptoms[]" value="Stomach Ache">
                        <label for="ache">Stomach Ache</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="fatigue" type="checkbox" name="symptoms[]" value="Fatigue">
                        <label for="fatigue">Fatigue</label>
                      </div>
  
                      <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                        <input class="form-check-input  rounded-0 my-2 mx-2" id="diarrhea" type="checkbox" name="symptoms[]" value="Diarrhea">
                        <label for="diarrhea">Diarrhea</label>
                      </div>

                      <div style="display: flex; justify-content: flex-start; align-items: center; width: max-content;">
                        
                        <div style="display: flex; justify-content: flex-start; align-items: center; width: max-content;">
                          
                          <input class="form-check-input  rounded-0 my-2 mx-2" id="other" type="checkbox">
                          <label for="other"> Others </label>
                          
                        </div>

                        <input class="form-control" type="text" id="otherSymptoms" name="symptoms[]" style="margin-left: 10px;" disabled>
  
                      </div>
                     
  
                    </div>
                  </div>

                  <script>
                   
                  </script>
  
                  <div class="col-md-6">
  
                    <h6 class="fw-bold mb-3">Body Temperature <span class="required"> * </span></h6>
                    <div class="input-group input-group-sm mb-3">

                      <input type="text" class="form-control" id="body_temp" name="body_temp" maxlength="2" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>

                    </div>

                    <h6 class="fw-bold mb-3"> Blood Pressure <span class="required"> * </span></h6>
                    <div class="input-group input-group-sm mb-3">
                      <input type="text" class="form-control" id="bp" name="systolic" maxlength="3" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="Systolic" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                      <input type="text" class="form-control" id="bp" name="diastolic" maxlength="3" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="Diastolic" required>
                    </div>
  
                    <h6 class="fw-bold mb-3 text-wrap">Have you been in close contact to suspected or confirmed covid case for the past 14 days? <span class="required"> * </span></h6>
  
  
                    <div class="d-flex mb-3">
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="close_contact" id="close_contact_yes" value="yes" required>
                        <label class="form-check-label" for="close_contact_yes">
                          Yes
                        </label>
                      </div>
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="close_contact" id="close_contact_no" value="no" required>
                        <label class="form-check-label" for="close_contact_no">
                          No
                        </label>
                      </div>
  
                    </div>
                    <h6 class="fw-bold mb-3 text-wrap">Have you been tested for covid in the past 10 days? <span class="required"> * </span></h6>
                    <div class="form-check mx-2 mt-3">
                      <input class="form-check-input" type="radio" id="Antigen Test" value="Antigen Test" name="covid_test" required>
                      <label class="form-check-label" for="Antigen Test">
                        Antigen Test
                      </label>
                    </div>
                    <div class="form-check mx-2 mt-3">
                      <input class="form-check-input" type="radio" id="Rapid Test" value="Rapid Test" name="covid_test" required>
                      <label class="form-check-label" for="Rapid Test">
                        Rapid Test
                      </label>
                    </div>
                    <div class="form-check mx-2 mt-3">
                      <input class="form-check-input" type="radio" id="RT PCR" value="RT PCR" name="covid_test" required>
                      <label class="form-check-label" for="RT PCR">
                        RT PCR
                      </label>
                    </div>
                    <div class="form-check mx-2 mt-3">
                      <input class="form-check-input" type="radio" id="No" value="No" name="covid_test" required>
                      <label class="form-check-label" for="No" >
                        No
                      </label>
                    </div>
                  </div>
  
                </div>
  
                <div class="row px-5 py-4">
                  <div class="col-md-4">
                    <h6 class="fw-bold mb-3"> Injuries </h6>

                    <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                      <input class="form-check-input  rounded-0 my-2 mx-2" id="Fractures" type="checkbox" name="injuries[]" value="Fractures">
                      <label for="Fractures"> Fractures </label>
                    </div>

                    <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                      <input class="form-check-input  rounded-0 my-2 mx-2" id="Contusions" type="checkbox" name="injuries[]" value="Contusions">
                      <label for="Contusions"> Contusions </label>
                    </div>

                    <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                      <input class="form-check-input  rounded-0 my-2 mx-2" id="Lacerations" type="checkbox" name="injuries[]" value="Lacerations">
                      <label for="Lacerations"> Lacerations </label>
                    </div>

                    <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                      <input class="form-check-input  rounded-0 my-2 mx-2" id="Burns" type="checkbox" name="injuries[]" value="Burns">
                      <label for="Burns"> Burns </label>
                    </div>

                    <div class="input-group input-group-sm mb-3 d-flex align-items-center">
                      <input class="form-check-input  rounded-0 my-2 mx-2" id="Dislocations" type="checkbox" name="injuries[]" value="Dislocations">
                      <label for="Dislocations"> Dislocations </label>
                    </div>

                  </div>

                  <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Stay in the clinic? <span class="required"> * </span></h6>
                    <div class="d-flex mb-3">
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="confined" id="confined_yes" value="yes" required>
                        <label class="form-check-label" for="confined_yes">
                          Yes
                        </label>
                      </div>
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="confined" id="confined_no" value="no" required>
                        <label class="form-check-label" for="confined_no">
                          No
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <h6 class="fw-bold mb-3">How long? <span class="required"> * </span></h6>
                    <input type="text" class="form-control" id="how_long" name="how_long" placeholder="per Hr" maxlength="2" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" disabled required>
                  </div>
                </div>
  
                <div class="row px-5 py-4 d-flex justify-content-between">
  
                  <div class="col-md-4">
  
                    <h6 class="fw-bold mb-3">Referred to hospital? <span class="required"> * </span></h6>
                    
                    <div class="d-flex mb-3">
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="referred" id="referred_yes" value="yes" required>
                        <label class="form-check-label" for="referred_yes">
                          Yes
                        </label>
                      </div>
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="referred" id="referred_no" value="no" required>
                        <label class="form-check-label" for="referred_no">
                          No
                        </label>
                      </div>
                    </div>
  
                    <div class="col-md-5" id="hopital_selection">
                      
                      <select class="form-select mb-4" name="hospital" aria-label="Default select example" id="hospital" required disabled >
                        <option value="">Select Hospital</option>
                        <?php 
    
                        if (mysqli_num_rows($hos) > 0) {
                          while ($row = mysqli_fetch_array($hos)) {
    
                          ?> <option value="<?=$row['hospi_id']?>"> <?=$row['hospital']?> </option> <?php 
                          
                          }
                        }
                        
                        ?>
                      </select>
  
                    </div>
  
                    <span class="fw-bold my-2 ">Address</span>
  
                    <div id="hospital-list" data-hospital class="p-0 w-100 d-flex justify-content-center"></div>
  
                  </div>
  
                  <div class="col-md-5 position-relative">
                    
                    <h6 class="fw-bold mb-3">Medicine Given <span class="required"> * </span></h6>
                    
                    <select class="form-select" aria-label="Default select example" id="medicine">
                      <option value=""> Select Medicine </option>
                      <?php 
                      
                      if (mysqli_num_rows($medicine) > 0) {
                        while ($row = mysqli_fetch_array($medicine)) {
                          ?> <option value="<?=$row['name']?>"><?=$row['name']?></option> <?php
                        }
                      }
                      
                      ?>
                    </select>
  
                    <ul id="list" class="mt-3 py-2 "></ul>
  
                  </div>
  
                  <div class="col-md-2">
                    
                    <h6 class="fw-bold mb-3">Cleared? <span class="required"> * </span></h6>
                    
                    <div class="d-flex mb-3">
                      
                      <div class="form-check mx-2">
                        
                        <input class="form-check-input" type="radio" name="cleared" id="cleared_yes" value="cleared" required>
                        <label class="form-check-label" for="cleared_yes"> Yes </label>
                      </div>
                      
                      <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="cleared" id="cleared_no" value="not cleared" required>
                        <label class="form-check-label" for="cleared_no"> No </label>
  
                      </div>
                    </div>
                  </div>
  
                  <div class="d-flex gap-3 justify-content-end mt-5">

                    <span id="sample-mess"></span>
                    
                    <button type="submit" class="btn btn-primary" data-id="<?=$student_id?>" name="confirm">Confirm</button>
                    
                  </div>
                  
                </div>
                  
              </div>
              
            </form>

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
      
      let isConfirm = confirm("Are you sure you want to submit this consultation?");
      
      if(isConfirm) {
          
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
          
      }

     

    })

  });
</script>


<!-- CUSTOM AJAX FILE -->
<script src="./ajax/isArchive.js"></script>

</html>