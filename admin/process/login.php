<?php 
session_start(); 
include "../includes/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {


	$role = $_POST['role'];

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);



	// error validation if username is empty
	if (empty($uname)) {

		$_SESSION['errMessage'] = "Email is required!";
		header("Location: ../index.php");
	   exit();

	}

	// error validation if password is empty
	else if(empty($pass)){

		$_SESSION['errMessage'] = "Password is required!";
		header("Location: ../index.php");
	   exit();

	}
	
	// if both is given
	else{

		// hashing the password
     

		switch ($role){
			case "admin":{

				$pass = md5($pass);

				$sql = "SELECT * FROM admins WHERE `email` = '$uname' AND `password` = '$pass'";

				

				break;
			}

			case "nurse":{

				$sql = "SELECT * FROM `nurses` WHERE `username` = '$uname' AND `password` ='$pass'";

			}
		}

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

			switch($role){
				case "admin":{
					
					$_SESSION['user_id'] = $row['user_id'];
					header("Location: ../pages/dashboard.php");
					break;
				}

				case "nurse":{

					

					if($row['isArchive'] == 1) {
					    
					    $_SESSION['errMessage'] = "This account is banned! Contact your superior.";
						unset($_SESSION['emp_id']);
						header("Location: ../index.php");

					} else {

						$_SESSION['emp_id'] = $row['emp_id'];
						header("Location: ../../nurse/dashboard.php");
						
					}

					break;

				}

			}

			

		} 
		else {		// error validation if username and password didn't exist in database
			
			$_SESSION['errMessage'] = "You do not have an account yet"; 	// pass error message
			header("Location: ../index.php");									// redirecct to index/login page
			exit();

		}
		


		// $sql = "SELECT * FROM admins WHERE email = '$uname' AND password='$pass'";

		// $result = mysqli_query($conn, $sql);

		// if (mysqli_num_rows($result) === 1) {

		// 	$row = mysqli_fetch_assoc($result);

      //       if ($row['email'] === $uname && $row['password'] === $pass) {

      //       	$_SESSION['user_id'] = $row['user_id'];
      //       	header("Location: ../pages/dashboard.php");
		//         	exit();

      //       } else {
					
		// 			$_SESSION['errMessage'] = "Incorect email or password!";
		// 			header("Location: ../index.php");
		// 			exit();
		// 	}

		// } else{

		// 	$_SESSION['errMessage'] = "Incorect email or password!";
		// 	header("Location: ../index.php");
		// 	exit();
		// }
	}
	
}else{

	// header("Location: index.php");
	// exit();
	
}



function validate($data){

	$data = trim($data);

	$data = stripslashes($data);

	$data = htmlspecialchars($data);

	return $data;
}

