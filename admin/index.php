<?php

	include "./includes/db_conn.php";
	include "./functions/admin.php";

	error_reporting(0);
	session_start();


	$check_admin = fetchAdmin($conn, null);

	$id = $_SESSION['user_id'];
	$emp_id = $_SESSION['emp_id'];
	$gemp_id = $_SESSION['gemp_id'];

	if(!empty($id)) {

		header("location: ./pages/dashboard.php");
		

 	}
	
	if(!empty($emp_id)){

		header("Location: ../nurse/dashboard.php");
		
	}

	if(!empty($gemp_id)){

		header("Location: ../entrance/entrance-dashboard.php");
		
	}
	
	




?>

<!DOCTYPE html>
<html>
<head>


	<link rel="icon" type="image/png" href="./assets/favcon.png"/>
	<title>SMRMS | ADMIN | LOGIN</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
	
	

</head>
<body>
	
<div class="header">

<div class="header-name">
	<img src="./assets/QCUClinicLogo.png" alt="">
	<h3>Student Medical Record Management System</h3>
</div>

</div>

       

	<form action="./process/login.php" method="post">
	   

     	<div class="header_login">
			<center><p>WELCOME BACK, LOGIN HERE!</p></center>
		</div>
		<div class="input_wrapper">
			<?php if (isset($_SESSION['errMessage'])) { ?>
				<p class="error"><?php echo $_SESSION['errMessage']; ?></p>
			<?php } ?>
			<div class="custom-select" style="width:200px;">
				<select name="role" id="role" required>
					<option value="">Select role</option>
					<option value="admin">Head Nurse/Admin</option>
					<option value="nurse">Nurse</option>
					<option value="guard">Guard</option>
				</select>
			</div>
			<div class="input">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" name="uname" placeholder="Enter username">
			</div>
				<center><span></span></center>
			<div class="input">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" name="password" id="floatingPassword" placeholder="Enter password">
			</div>
                 
				<br>
		</div>

     		<center><button type="submit">LOGIN</button></center>
			
			<div class="footer-form">
				<div class="create"> 

				</div>

				<div class="forgot">
					<a href="#">Forget Password?</a> 
				</div>
			
   </form>
</body>

<script>
	$(document).ready(function(){

		$('.error').fadeOut(5000);

	});
	
</script>

<script>
	$(document).ready(function(){

		$('#role').change(function(){
			let role = $(this).val();

			if(role == "guard"){
				$('.create').html("<a href='../entrance/register.php'> Register account </a>");
			} else {
				$('.create').html("");
			}
		});

	});
</script>

<script> 

const pass = document.getElementById('floatingPassword');
const showPass = document.getElementById('show-pass');

showPass.addEventListener('change', (e)=> {

  if(showPass.checked === true) {
	 
	 pass.type = 'text';

  } else {
	 
	 pass.type = 'password';

  }
	 
});
</script>

<?php 
	unset($_SESSION['errMessage']);
?>
</html>


