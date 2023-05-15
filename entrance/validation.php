<?php

include './connection.php';
$uname = $_POST['text'];

if(isset($_POST['text']) && isset($_POST['campus'])){
    $query = "SELECT * FROM sample_stud_data WHERE student_id='$uname'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $verified = 'Cleared';
    $notverified = 'Not Cleared';

        $text = $_POST['text'];
        $date = date('m-d-Y');
        $time = date('H:i:s');
        $lname = $row["lastname"];
        $fname = $row["firstname"];
        $mname = $row["middlename"];
        $section = $row["Section"];
        $ylevel = $row["Year Level"];
        $status = $row['Status'];
        $campus = $_POST['campus'];
        
    if($status==$verified){
        $_SESSION["student_id"] = $row["student_id"];
        echo '<script type = "text/javascript">';
        echo 'alert("Qrcode found!");';
        echo 'window.location.href = "entrance-dashboard.php"';
        echo '</script>';


        $sql = "INSERT INTO entrance_log (student_number,lastname,firstname,middlename,yearlevel,section,timein,logdate,status,campus) VALUES ('$text','$lname','$fname','$mname','$ylevel','$section',NOW(),'$date','$status','$campus')";
        if($conn->query($sql) === TRUE){
            $_SESSION['success'] = 'Successfuly time in';
        }else{
            $_SESSION['error'] = $conn->error;
        }
    }elseif($status==$notverified){
        echo '<script type = "text/javascript">';
        echo 'alert("This Student is not Verified");';
        echo 'window.location.href = "entrance-dashboard.php"';
        echo '</script>';

        $sql = "INSERT INTO entrance_log (student_number,lastname,firstname,middlename,yearlevel,section,timein,logdate,status,campus) VALUES ('$text','$lname','$fname','$mname','$ylevel','$section',NOW(),'$date','$status','$campus')";
        if($conn->query($sql) === TRUE){
            $_SESSION['success'] = 'Successfuly time in';
        }else{
            $_SESSION['error'] = $conn->error;
        }

    }else{
        echo '<script type = "text/javascript">';
        echo 'alert("Qrcode not found!");';
        // echo 'window.location.href = "entrance-dashboard.php"';
        echo '</script>';

        $sql = "INSERT INTO entrance_log (student_number,lastname,firstname,middlename,yearlevel,section,timein,logdate,status,campus) VALUES ('N/A','N/A','N/A','N/A','N/A','N/A',NOW(),'$date','Invalid','$campus')";
        if($conn->query($sql) === TRUE){
            $_SESSION['success'] = 'Successfuly time in';
        }else{
            $_SESSION['error'] = $conn->error;
        }
    }
}
?>