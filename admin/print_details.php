<?php 

require_once '../dompdf/autoload.inc.php';
// include "./includes/date_today.php";


// reference the Dompdf namespace
use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

$type = $_GET['type'];

$filename = '';

switch($type){
   
   case "appointment":
      require('./generate_report/appointments.php');
      $filename = "appointment_report_".date('Y');
      
      break;

   case "medicine":
      require('./generate_report/medicine.php');
      $filename = "medicine_report_".date('Y');
      break;

   case "consultation":
      require('./generate_report/consultation.php');
      $filename = "consultation_report_".date('Y');
      break;
}


$html = ob_get_contents();

ob_end_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

// (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename.'.pdf', ['Attachment'=>false]);


?>