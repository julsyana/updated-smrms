<?php

function fetchReport($conn){
   $sel = "SELECT *, LEFT(b.middlename, 1) as `mi` FROM `stud_appointment` a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   JOIN `appointment_dates` d
   ON a.app_date_id = d.app_date_id
   JOIN `appointment` e
   ON a.se_id = e.app_id
   WHERE a.app_status = 'attended'
   ORDER BY a.id DESC;";

   $res = mysqli_query($conn, $sel);
   
   return $res;
}


function fetchConsult($conn){
   $sel = "SELECT *, LEFT(b.middlename, 1) as mi, b.firstname as s_fname, b.lastname as s_lname, b.gender as s_gender FROM consultations a
    JOIN `mis.student_info` b
    ON a.student_id = b.student_id
    JOIN `mis.enrollment_status` c
    ON a.student_id = c.student_id
    JOIN nurses d
    ON a.emp_id = d.emp_id
    ORDER BY a.id DESC;";

   $res = mysqli_query($conn, $sel);
   
   return $res;
}

// function totalService($conn, $service){

//    $cnt = "SELECT * FROM `stud_appointment` WHERE `app_type` = '$service'";
//    $res = mysqli_query($conn, $cnt);
//    $total = mysqli_num_rows($res);

//    return $total;

// }  


function fetchMeds($conn){

   $cnt = "SELECT DISTINCT(name), expirationDate FROM `medicine`";
   $res = mysqli_query($conn, $cnt);
   // $total = mysqli_num_rows($res);

   return $res;

}  

function totalBranch($conn, $branch){
   $cnt = "SELECT sum(num_stocks) as total FROM `medicine` WHERE campus = '$branch'";
   $res = mysqli_query($conn, $cnt);

   $total = mysqli_fetch_assoc($res);

   return $total;
}


function totalQty($conn, $medicine){
    $cnt = "SELECT prod_id, SUM(`num_stocks`) as total, SUM(`med_used`) as totalUsed, (SUM(`num_stocks`) - SUM(`med_used`)) as remaining,
    SUM((SELECT `num_stocks` FROM medicine WHERE campus = 'San Bartolome' AND prod_id = a.prod_id)) as sanBartolome,
    SUM((SELECT `num_stocks` FROM medicine WHERE campus = 'Batasan' AND prod_id = a.prod_id)) as batasan,
    SUM((SELECT `num_stocks` FROM medicine WHERE campus = 'San Francisco' AND prod_id = a.prod_id)) as sanFrancisco,
    
    SUM((SELECT `med_used` FROM medicine WHERE campus = 'San Bartolome' AND prod_id = a.prod_id)) as usedSB,
    SUM((SELECT `med_used` FROM medicine WHERE campus = 'Batasan' AND prod_id = a.prod_id)) as usedBAT,
	SUM((SELECT `med_used` FROM medicine WHERE campus = 'San Francisco' AND prod_id = a.prod_id)) as usedSF,
    
    SUM((SELECT (`num_stocks` - `med_used`) FROM medicine WHERE campus = 'San Bartolome' AND prod_id = a.prod_id)) as rSB,
    SUM((SELECT (`num_stocks` - `med_used`) FROM medicine WHERE campus = 'Batasan' AND prod_id = a.prod_id)) as rBAT,
	SUM((SELECT (`num_stocks` - `med_used`) FROM medicine WHERE campus = 'San Francisco' AND prod_id = a.prod_id)) as rSF
    
    FROM medicine as a WHERE `name` = '$medicine';";
    
    $res = mysqli_query($conn, $cnt);

   $total = mysqli_fetch_assoc($res);

   return $total;
}


?>