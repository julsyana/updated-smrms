<?php

include "../../includes/db_conn.php";

if(empty($_POST['stud_id'])){

   $student_id = $_GET['stud_id'];

} else{

   $student_id = $_POST['stud_id'];
}

requirement_row($conn1, $student_id);


function select_requirement($conn1,$student_id){
   $sql = "SELECT * FROM stud_medical_requirements WHERE student_id  = '$student_id' ";
   $query = $conn1->query($sql);
   $row = $query->fetch_assoc();
   
   return $row;
}
      

function requirement_row($conn1,$student_id){
   get_data();
   $row = select_requirement($conn1,$student_id);
   
   $cbc_id = $row['id'];
   $cbc_file = $row['cbc_file'];
   $cbc_date_submitted = $row['cbc_date_submitted'];
   $cbc_status = $row['cbc_status'];
   
   
   $uri_id = $row['id'];
   $uri_file = $row['uri_file'];
   $uri_date_submitted = $row['uri_date_submitted'];
   $uri_status = $row['uri_status'];
  

   $xRay_id = $row['id'];
   $xRay_file = $row['xray_file'];
   $xRay_date_submitted = $row['xray_date_submitted'];
   $xRay_status = $row['xray_status'];
  
   $med_cert_id = $row['id'];
   $med_cert_file = $row['med_cert_file'];
   $med_cert_date_submitted = $row['med_cert_date_submitted'];
   $med_cert_status = $row['med_cert_status'];

   $med_cert_file = new Data_file($med_cert_id,$student_id,"Medical Certificate",$med_cert_file,$med_cert_date_submitted,$med_cert_status,'med_cert_status','med_cert_reason');
   $xRay_file = new Data_file( $xRay_id,$student_id,"Chest X-ray",$xRay_file,$xRay_date_submitted,$xRay_status,'xray_status','xray_reason');
   $uri_file = new Data_file( $uri_id,$student_id,"Urinalysis",$uri_file,$uri_date_submitted,$uri_status,'uri_status','uri_reason');
   $cbc_file = new Data_file( $cbc_id,$student_id,"Complete Blood Count (CBC)",$cbc_file,$cbc_date_submitted,$cbc_status,'cbc_status','cbc_reason');
}


function get_data(){

   class Data_file {
       private $id;
       private $student_id;
       private $docu_type;
       private $file_name;
       private $submitted_date;
       private $status;
       private $status_column;
       private $reason_column;

       public function __construct($id,$student_id,$docu_type,$file_name,$submitted_date,$status,$status_column,$reason_column){
         $this->id = $id;
         $this->student_id = $student_id;
         $this->docu_type = $docu_type;
         $this->file_name = $file_name;
         $this->submitted_date = $submitted_date;
         $this->status = $status;
         $this->status_column = $status_column;
         $this->reason_column = $reason_column;
       }

     function __destruct(){

      echo "              
           <tr class='p-3'>
           <td class='col-2 py-3'>{$this->docu_type}</td>
           <td class='col-3 py-3'>{$this->submitted_date}</td>
           <td class='col-4 py-3'>
           <a target='_blank' href='../../student/redo/medical-requirements/{$this->file_name}'>
                               {$this->file_name} </a></td>";  
            if($this->status == "approved" ){           
               echo"<td class='text-success fw-semibold text-center py-3' colspan='2'>Approved</td>";
             }elseif($this->status == "declined"){
               echo"<td class='text-danger fw-semibold text-center py-3'>Re-submit</td>";
             }
             else{
               echo "<td class='p-0 text-center py-3'><button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#declined_modal'  id='declined' reason-column='{$this->reason_column}'
               status-column='{$this->status_column}'  data-student_id='{$this->student_id}'>Decline</button></td>
               <td class='p-0 text-center py-3'><button class='btn btn-success' id='approved' data-id='{$this->id}'  data-column='{$this->status_column}' data-student_id='{$this->student_id}' >Approve</button></td>";
                         
             };
   
       echo"</tr>";
       }
   }
}
   
   
?>