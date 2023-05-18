<?php
// Connect to database
$host = "localhost";
$username = "u121162919_clinicsmrms";
$password = "[MT^dz2w78wO";
$dbname = "u121162919_clinicms_db";
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
// $conn = mysqli_connect("localhost", "u121162919_clinicsmrms", "[MT^dz2w78wO", "u121162919_clinicms_db");

try {
  $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  die("Could not connect to database: " . $e->getMessage());
}

// Check if email already exists in database
$email = $_POST['visitor_email'];
$stmt = $pdo->prepare("SELECT * FROM `mis.student_info` WHERE email = :email");
$stmt->execute(['email' => $email]);
$existing_visitor = $stmt->fetch(PDO::FETCH_ASSOC);

if ($existing_visitor) {
  // Email already exists, return error message
  echo json_encode(['success' => false, 'message' => 'Email already exists']);
  exit();
}

// Email does not exist, return success response
echo json_encode(['success' => true]);
