<?php
   include './date.php';
   include './connection.php';
   include './queries.php';

   if(isset($_POST['visitor_btn'])){

      $visitor_name = $_POST['visitor_name'];
      $visitor_cnum = $_POST['visitor_cnum'];
      $visitor_purp = $_POST['visitor_purp'];
      $visitor_dept = $_POST['visitor_dept'];
      $visitor_email = $_POST['visitor_email'];
      $campus = $_POST['campus'];


      $ins_visitor = "INSERT INTO `visitors`
      (`fullname`, `contact_num`, `purpose`,`email` ,`department`,`campus` ,`date`, `timein`) 
      VALUES 
      ('$visitor_name','$visitor_cnum','$visitor_purp','$visitor_email','$visitor_dept','$campus','$date_today','$time_today')";

      $res_visitor = mysqli_query($conn, $ins_visitor);

      if(!$res_visitor) {

         echo mysqli_error($conn);

      } else{

      echo "<span id='suc-vit' style='background-color: #4EC745; color: #ffffff; padding: 0 5px;'> Submitted Successfully! </span>";
      echo "<script>
         setTimeout(function(){
            var notification = document.getElementById('suc-vit');
            notification.style.display = 'none';
         }, 3000);
      </script>";
?>

         <script>
            $('.numerical').load('./total.php');
            $('.table_contents').load('./visitor_tbl.php');
         </script>
         
         <?php 

      }
      
   }

?>