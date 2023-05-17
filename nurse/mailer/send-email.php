
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

$email = $_POST["email"];
$attachment = $_POST['attachment'];
$ref_no = $_POST['ref_no'];
$student_id = $_POST['student_id'];


// require "vendor/autoload.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com' ;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; //TSL
// $mail->Port = 465; //SSL

// $mail->Username = "Mistergrandph@gmail.com";
// $mail->Password = "tdnshdzapjuwrbkw";

// $mail->Username = "arnejovincent03@gmail.com";
// $mail->Password = "ceecdhnpjkshnpqn";

// $mail->Username = "studmed.recordms.2023@gmail.com";
// $mail->Password = "qmgdqhrozvdbypdb";

$mail->Username = 'qcu.clinic.smrms@gmail.com';
$mail->Password = 'vptkkshttnjvnhde';

$filename = '' . $student_id. '_'.$ref_no.'_excuse-slip.pdf';

$mail->setFrom("studmed.recordms.2023@gmail.com", "Student Medical Record MS");
// $mail->addAddress("arnejovincent03@gmail.com", "MGP INQUERIES");
$mail->addAddress($email, "");//RECEPIENTS
$attachment = base64_decode($attachment);
$mail->addStringAttachment($attachment, $filename, 'base64', 'application/pdf');

$filepath = '../certificates/'. $filename;
file_put_contents($filepath, $attachment);

$mail->Subject = " Medical Certificate";
$mail->Body = "Certificate";

if($mail-> send()){

    include "../includes/db_conn.php";

    $upd = mysqli_query($conn1, "UPDATE `consultations` SET `isEmail`= 1 WHERE `reference_no` = '$ref_no';");
    $sql = mysqli_query($conn1, "INSERT INTO medical_attachments (reference_no,student_id,med_files,time_added) VALUES ('$ref_no','$student_id','$filename',NOW())");

} else {

    $email->ErrorInfo;
}
    // header("Location: student-verify-otp.php");
?>