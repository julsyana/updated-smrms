<?php
error_reporting(0);
include './connection.php';


session_start();

$gemp_id = $_SESSION['gemp_id'];

if(empty($gemp_id)){

  header("Location: ../admin/index.php");

}

$result = mysqli_query($conn,"SELECT * FROM `guard_info` WHERE `emp_id` = '$gemp_id'");
$guard = mysqli_fetch_assoc($result);

$campus = $guard['desginatedCampus'];


include './queries.php';





?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="./assets/favcon.png"/>
        <title>SMRMS | Entrance Page</title>
        
        <link rel="stylesheet" href="./style.css" />
        <link rel="stylesheet" href="./ent-das-style.css" />
        <link rel="stylesheet" href="table.css">
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- AJAX -->
        <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

        <style>
          .error-message {
            color: red;
            font-size: 10px;
          }
        </style>

    </head>
         
    <body>
      
      <div class="header">

          <div class="header-name">
              <img src="./assets/QCULogo.png" alt="">
              <h3>Welcome to Quezon City University</h3>
          </div>


          <div class="account">
            <p> <?=$guard['fname']?> <?=$guard['lname']?> <?=$guard['mi']?>. </p>

            <div class="logout">
              <a href="./logout.php"> Logout </a>
            </div>
          </div>

          <div id="date">

          </div>
          
      </div>

      <div class="main-container">

        <div class="container">

          <div class="subcontainer">
            
            <div class="numerical">
              <?php include "./total.php"; ?>
            </div>
            <!-- <div class="form-scan">
              <form action="" method="post">
                  <select name="campus" id="campus-select" class="form-control" onchange="disableSelect()">
                    <option value=''>Select a campus</option>
                    <option value="San Bartolome">San Bartolome</option>
                    <option value="Batasan">Batasan</option>
                    <option value="San Francisco">San Francisco</option>
                  </select>
                  <input type="text" name="text" id="student_id" placeholder="Student Number" class="form-control class" method="get" style="visibility: hidden">
              </form>
            </div> -->
            <div class="video">
              <video id="preview" width="100%"></video>
              
            </div>
  
        
            
            <div class="visitor-form">

              <h4>Visitors Form <span></span></h4>
              
              <form action="./insert_visitor.php" method="POST" enctype="multipart/form-data" id="form_visitor">
                <input type="text" id="visitor_name" name="visitor_name" placeholder="Full Name (ex.: Juan C. Dela Cruz/Juan Dela Cruz)" pattern="[A-Za-z\s,.\-]+" disabled>
                <div id="visitor_name_error" class="error"></div>

                <input type="text" id="visitor_cnum" name="visitor_cnum" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Contact Number (ex.: 09123456789)" maxlength="11" disabled>
                <div id="visitor_cnum_error" class="error"></div>

                <input type="text" id="visitor_dept" name="visitor_dept" placeholder="Department (ex.: Registrar)" disabled>
                <div id="visitor_dept_error" class="error"></div>

                <input type="text" id="visitor_purp" name="visitor_purp" placeholder="Purpose (ex.: Inquiries)" disabled>
                <div id="visitor_purp_error" class="error"></div>

                <input type="email" id="visitor_email" name="visitor_email" placeholder="Email (ex.: juandelacruz@gmail.com)" disabled>
                <div id="visitor_email_error" class="error-message"></div>

                <input type="button" id="visitor_btn" name="visitor_btn" value="Submit">
              </form>


            </div>

          
            
          </div>
            
          <div class="table-container">
          

            <div class="message"> 

            </div>

            <div class="form-scan">
              <form action="" method="post">
                  <select name="campus" id="campus-select" class="form-control" onchange="disableSelect()" style="text-transform: capitalize;">
                    <option value=''>Select campus</option>
                    <option value="<?=$guard['desginatedCampus']?>"><?=$guard['desginatedCampus']?></option>
                    <!-- <option value="Batasan">Batasan</option>
                    <option value="San Francisco">San Francisco</option> -->
                  </select>
                  <input type="text" name="text" id="student_id" placeholder="Student Number" class="form-control class" method="get" style="visibility: hidden">
              </form>
            </div>

            <div class="form-button">

              <button id="students-btn" class="selected students"> <?php //echo $verified_total;?>Cleared </button>

              <button id="pending-btn"> <?// echo $notverified_total?>PUI </button>

              <button id="visitor-btn"><?//=$total_visitor?> Visitors </button>

              <button id="archive-btn"><?//=$archive_total?>Archive </button>

            </div>

         

            <div class="table-contents">

              <?php include "./entrance_log.php"; ?>

            </div>

            
            <div class="student-id">
                <!--  student_info.php -->
            
            </div>
              

          </div>

          <div class="pop-up-modal" id="not-verified">
            <!-- modal -->
          </div>
            
        </div>

        
        
       
      </div>


<script>
  $(document).ready(function() {
  // Validate visitor name on input
  $("#visitor_name").on("input", function() {
    validateVisitorName();
  });

  // Validate visitor contact number on input
  $("#visitor_cnum").on("input", function() {
    validateVisitorCNum();
  });

  // Validate visitor department on input
  $("#visitor_dept").on("input", function() {
    validateVisitorDept();
  });

  // Validate visitor purpose on input
  $("#visitor_purp").on("input", function() {
    validateVisitorPurp();
  });

  // Validate visitor email on input
  $("#visitor_email").on("input", function() {
    validateVisitorEmail();
  });

  // Validate visitor name
  function validateVisitorName() {
    var visitorName = $("#visitor_name").val().trim();
    if (!/^[a-zA-Z\s,.\-]+$/.test(visitorName)) {
      $("#visitor_name_error").html("<span class='error-message'>* Please enter a valid name (only letters, spaces, commas, hyphens, and periods are allowed)</span>");
      $("#visitor_name").addClass("error-input");
      $("#visitor_btn").css('cursor', 'not-allowed');
      $("#visitor_btn").prop("disabled", true);
    } else {
      $("#visitor_name_error").text("");
      $("#visitor_name").removeClass("error-input");
      $("#visitor_btn").css('cursor', 'pointer');
      $("#visitor_btn").prop("disabled", false);
    }
}


  $("#form_visitor").on("submit", function(event) {
      validateVisitorName();
      if ($("#visitor_name_error").text() !== "") {
        event.preventDefault();
      }
    });

  // Validate visitor contact number
  function validateVisitorCNum() {
    var visitorCNum = $("#visitor_cnum").val().trim().substr(0, 11);
    if (!/^09\d{9}$/.test(visitorCNum)) {
      $("#visitor_cnum_error").html("<span class='error-message'>* Please enter a valid contact number (11 digits starting with '09')</span>");
      $("#visitor_cnum").addClass("error-input");
      $("#visitor_btn").css('cursor', 'not-allowed');
      $("#visitor_btn").prop("disabled", true);
    } else {
      $("#visitor_cnum_error").text("");
      $("#visitor_cnum").removeClass("error-input");
      $("#visitor_btn").css('cursor', 'pointer');
      $("#visitor_btn").prop("disabled", false);
      
    }
  }

  $("#form_visitor").on("submit", function(event) {
      validateVisitorCNum();
      if ($("#visitor_cnum_error").text() !== "") {
        event.preventDefault();
      }
    });

  // Validate visitor department
  function validateVisitorDept() {
    var visitorDept = $("#visitor_dept").val().trim();
    if (!/^[a-zA-Z\s]+$/.test(visitorDept)) {
      $("#visitor_dept_error").html("<span class='error-message'>* Please enter a valid department (only letters and spaces are allowed)</span>");
      $("#visitor_dept").addClass("error-input");
      $("#visitor_btn").css('cursor', 'not-allowed');
      $("#visitor_btn").prop("disabled", true);
    } else {
      $("#visitor_dept_error").text("");
      $("#visitor_dept").removeClass("error-input");
      $("#visitor_btn").css('cursor', 'pointer');
      $("#visitor_btn").prop("disabled", false);
    }
  }

  $("#form_visitor").on("submit", function(event) {
      validateVisitorDept();
      if ($("#visitor_dept_error").text() !== "") {
        event.preventDefault();
      }
    });

  // Validate visitor purpose
  function validateVisitorPurp() {
    var visitorPurp = $("#visitor_purp").val().trim();
    if (!/^[a-zA-Z\s]+$/.test(visitorPurp)) {
      $("#visitor_purp_error").html("<span class='error-message'>* Please enter a valid purpose (only letters and spaces are allowed)</span>");
      $("#visitor_purp").addClass("error-input");
      $("#visitor_btn").css('cursor', 'not-allowed');
      $("#visitor_btn").prop("disabled", true);
    } else {
      $("#visitor_purp_error").text("");
      $("#visitor_purp").removeClass("error-input");
      $("#visitor_btn").css('cursor', 'pointer');
      $("#visitor_btn").prop("disabled", false);
    }
  }

  $("#form_visitor").on("submit", function(event) {
      validateVisitorPurp();
      if ($("#visitor_purp_error").text() !== "") {
        event.preventDefault();
      }
    });

  // Validate visitor email
  function validateVisitorEmail() {
    var visitorEmail = $("#visitor_email").val().trim();
    if (!/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(visitorEmail)) {
      $("#visitor_email_error").html("<span class='error-message'>* Please enter a valid email address</span>");
      $("#visitor_email").addClass("error-input");
      $("#visitor_btn").css('cursor', 'not-allowed');
      $("#visitor_btn").prop("disabled", true);
    } else {
      // Check if email already exists in database
      $.ajax({
        url: "./check_email.php",
        type: "POST",
        data: {visitor_email: visitorEmail},
        dataType: "json",
        success: function(response) {
          if (response.success) {
            $("#visitor_email_error").text("");
            $("#visitor_email").removeClass("error-input");
            $("#visitor_btn").css('cursor', 'pointer');
            $("#visitor_btn").prop("disabled", false);
          } else {
            // Email already exists, display new error message
            $("#visitor_email_error").html("<span class='error-message'>" + response.message + "</span>");
            $("#visitor_email").addClass("error-input");
            $("#visitor_btn").css('cursor', 'not-allowed');
            $("#visitor_btn").prop("disabled", true);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
    }
  }

  $("#form_visitor").on("submit", function(event) {
      validateVisitorEmail();
      if ($("#visitor_email_error").text() !== "") {
        event.preventDefault();
      }
    });

});


</script>

<script>

  $(document).ready(function(){

    $('#visitor_btn').click(function(){
      
      const visitor_btn = $('#visitor_btn').serialize();
      const visitor_cnum = $('#visitor_cnum').val(); 
      const visitor_purp = $('#visitor_purp').val();
      const visitor_name = $('#visitor_name').val();
      const visitor_dept = $('#visitor_dept').val();
      const visitor_email = $('#visitor_email').val();
      const campus = $('#campus-select').val();

      if(visitor_cnum == '' || visitor_name === ''  || visitor_purp === '' || visitor_dept === '' || visitor_email === '' || campus === ''){

        $('.visitor-form h4 span').html('<span> Fill up form </span>');
        // alert('fill up!');

      } else {

        $('.visitor-form h4 span').load('./insert_visitor.php',{
          
          visitor_btn: visitor_btn,
          visitor_purp: visitor_purp,
          visitor_cnum: visitor_cnum,
          visitor_name: visitor_name,
          visitor_dept: visitor_dept,
          visitor_email: visitor_email,
          campus: campus
        });
        
        $('#visitor_cnum').val('');
        $('#visitor_purp').val('');
        $('#visitor_name').val('');
        $('#visitor_dept').val('');
        $('#visitor_email').val('');
        // $('#campus-select').val('');

        $('#visitor_cnum').attr('placeholder', 'Contact Number');
        $('#visitor_purp').attr('placeholder', 'Purpose');
        $('#visitor_name').attr('placeholder', 'Name');
        $('#visitor_dept').attr('placeholder', 'Department');
        $('#visitor_email').attr('placeholder', 'Email');
        // $('#campus-select').attr('placeholder', 'Campus');
      }

      
    
     
    });


  
    
  });

</script>
      
<script>
  
  $(document).ready(function(){
    
    $('#students-btn').click(function(){
  
      $('#students-btn').css('background', '#4EC745');
      $('#pending-btn').css('background', 'none');
      $('#visitor-btn').css('background', 'none');
      $('#archive-btn').css('background', 'none');
  
      $('.table-contents').load('./entrance_log.php');
        
    });
  
    $('#pending-btn').click(function(){
  
      $('#students-btn').css('background', 'none');
      $('#pending-btn').css('background', '#DCED31');
      $('#visitor-btn').css('background', 'none');
      $('#archive-btn').css('background', 'none');
      $('.table-contents').load('./pending_tbl.php');
        
    });
    
    $('#visitor-btn').click(function(){
  
      $('#students-btn').css('background', 'none');
      $('#pending-btn').css('background', 'none');
      $('#visitor-btn').css('background', '#f58800');
      $('#archive-btn').css('background', 'none');
      $('.table-contents').load('./visitor_tbl.php');
        
    });
  
    $('#archive-btn').click(function(){
    
      $('#students-btn').css('background', 'none');
      $('#pending-btn').css('background', 'none');
      $('#visitor-btn').css('background', 'none');
      $('#archive-btn').css('background', '#FF0022');
      $('.table-contents').load('./archive_tbl.php');
        
    });
  
  });
  
</script>



<script>

  $(document).ready(function(){
    let scanner = null;

    $('#campus-select').change(function() {
      const selectedCampus = $(this).val();

      if (selectedCampus) {
        scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

        Instascan.Camera.getCameras().then(function(cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            alert("No cameras found!");
          }
        });

        scanner.addListener('scan', function(c) {
          var stud_id = document.getElementById('student_id').value = c;

          $('.table-contents').load('./validation_test.php', {
            stud_id: stud_id,
            campus: selectedCampus
          });

          $('.student-id').load('./student_info.php', {
            stud_id: stud_id,
            
          });
        });
      } else {
        if (scanner !== null) {
          scanner.stop();
        }
      }
    });
  });
  
  function disableSelect() {
  var selectElement = document.getElementById("campus-select");
  var selectedValue = selectElement.value;
  if (selectedValue !== "") {
    selectElement.disabled = true;
  }
}

// get references to the form elements
const form = document.getElementById('form_visitor');
const nameInput = document.getElementById('visitor_name');
const cnumInput = document.getElementById('visitor_cnum');
const deptInput = document.getElementById('visitor_dept');
const purpInput = document.getElementById('visitor_purp');
const emailInput = document.getElementById('visitor_email');
const submitBtn = document.getElementById('visitor_btn');

// get reference to the select element
const campusSelect = document.getElementById('campus-select');

// function to enable/disable form elements
function enableFormElements(enabled) {
  nameInput.disabled = !enabled;
  cnumInput.disabled = !enabled;
  deptInput.disabled = !enabled;
  purpInput.disabled = !enabled;
  emailInput.disabled = !enabled;
  submitBtn.disabled = !enabled;
}

// add event listener to the select element
campusSelect.addEventListener('change', (event) => {
  const campusValue = event.target.value;
  if (campusValue === '') {
    enableFormElements(false);
  } else {
    enableFormElements(true);
  }
});


  function updateClock() {
    var now = new Date();
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var month = months[now.getMonth()];
    var day = days[now.getDay()];
    var date = now.getDate();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var amOrPm = hours < 12 ? 'AM' : 'PM';
    
    // Convert to 12-hour time
    if (hours > 12) {
      hours -= 12;
    } else if (hours === 0) {
      hours = 12;
    }
  
    // Add leading zeros to minutes and seconds
    //
    if (minutes < 10) {
      minutes = '0' + minutes;
    }
    if (seconds < 10) {
      seconds = '0' + seconds;
    }
  
    // Build the clock string
    var clockStr = month + ' ' + date + ', ' + day + ' ' + hours + ':' + minutes + ':' + seconds + ' ' + amOrPm;
  
    // Update the clock element
    document.getElementById('date').textContent = clockStr;
  }

  // Call updateClock() every second
  setInterval(updateClock, 1000);

</script>
      
    </body>
</html>