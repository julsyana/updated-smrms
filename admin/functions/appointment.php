<?php


function generateAppID($len){

   $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

   $code = '';

   for ($i = 0; $i < $len; $i++) {

       $code .= $characters[rand(0, strlen($characters) - 1)];
   }

   return $code;

}  

function selApp($conn, $appID){
    $sel = "SELECT * FROM `appointment`
    WHERE `app_id` = '$appID'";

    $res = mysqli_query($conn, $sel);

    $app = mysqli_fetch_assoc($res);

    return $app;
}

function selStudPerDate($conn, $dateID){

    $sel = "SELECT * FROM `stud_appointment` a
    JOIN `appointment_dates` b
    ON a.app_date_id = b.app_date_id
    JOIN `mis.student_info` c
    ON a.student_id = c.student_id
    WHERE a.app_date_id = '$dateID' AND b.app_dates >= CURDATE();";

    $res = mysqli_query($conn, $sel);

    return $res;

}

function selStudPerService($conn, $appID){

    $sel = "SELECT DISTINCT(c.email), c.*, a.app_type FROM `appointment` a
    JOIN `stud_appointment` b
    ON a.app_id = b.se_id
    JOIN `mis.student_info` c
    ON b.student_id = c.student_id
    JOIN `appointment_dates` d
    ON a.app_id = d.app_id
    WHERE A.app_id = '$appID' AND b.app_status != 'attended' AND d.app_dates >= CURDATE() AND b.app_status = 1;";

    $res = mysqli_query($conn, $sel);

    return $res;

}


function selAllApp($conn){
    $sel = "SELECT * FROM `appointment`  
    ORDER BY `appointment`.`status` DESC, `appointment`.`id` DESC;";

    $res = mysqli_query($conn, $sel);

    return $res;
}

function selAppDate($conn, $dateID){

    $sel = "SELECT * FROM `appointment_dates` WHERE app_date_id = '$dateID';";

    $res = mysqli_query($conn, $sel);

    $result = mysqli_fetch_assoc($res);

    return $result;
}


function selAppSched($conn, $appID){
    $sel = "SELECT * FROM `appointment_dates`
    WHERE `app_id` = '$appID' 
    ORDER BY `app_dates` ASC";

    $res = mysqli_query($conn, $sel);

    return $res;
}

function insApp($conn, $appID, $appType, $dateFiled){

    $ins = "INSERT INTO `appointment`
    (`app_id`, `app_type`, `date_filed`, `status`)
    VALUES 
    ('$appID', '$appType', '$dateFiled', 1)";

    $res = mysqli_query($conn, $ins);

    return $res;
}



function insAppSched($conn, $appDateID, $appID, $appDates, $appSlot, $dateAdded){

    $ins = "INSERT INTO `appointment_dates`
    (`app_id`, `app_date_id`, `app_dates`, `app_slot`, `app_status`, `date_added`) 
    VALUES 
    ('$appDateID', '$appID', '$appDates', '$appSlot', 1, '$dateAdded')";

    $res = mysqli_query($conn, $ins);

    return $res;
}




?>