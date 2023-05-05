<?php

// $sname= "localhost";
// $unmae= "root";
// $password = "";

// $db_name = "clinicms_db_test";

$conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");

// $conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

?>