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

				break;
			}

			case "guard": {

				$sql = "SELECT * FROM `guard_acc` WHERE `email` = '$uname' AND `password` = '$pass'";

				break; 
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

				case "guard": {

					$emp_id = $row['emp_id'];

					// echo $emp_id;
					$resStatus = mysqli_query($conn, "SELECT * FROM `guard_status` WHERE `emp_id` = '$emp_id'");
					$status = mysqli_fetch_assoc($resStatus);	

					if($status['isLogged'] == 0){

						$updStatus = "UPDATE `guard_status` SET `isLogged`= 1, `dateLogged`= NOW() WHERE `emp_id` = '$emp_id'";

						$updResult = mysqli_query($conn, $updStatus);

						if($updResult){

							$_SESSION['gemp_id'] = $emp_id;
							header("Location: ../../entrance/entrance-dashboard.php");

						}

						exit();

					

					} else {

						unset($_SESSION['emp_id']);
						header("Location: ../index.php");
						$_SESSION['errMessage'] = "this account is already logged in other device";
						exit();

					}

				}

			}

			

		} 
		else {		// error validation if username and password didn't exist in database
			
			$_SESSION['errMessage'] = "Invalid username and password"; 	// pass error message
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

