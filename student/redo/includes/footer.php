
<?php
if(mysqli_num_rows($sel_services) != 0){

   ?>
      <script>
         // console.log($('.primary-nav ul li'));

         const appointment_link = $('.primary-nav ul li:nth-child(6) a');

         // appointment_link.css('background-color', 'red');

         appointment_link.hover().css('background', 'none');

         appointment_link.css('color', '#fff6');
         appointment_link.css('cursor', 'not-allowed');
         appointment_link.attr('disabled', true);
         appointment_link.attr('href', '#');


      </script>
   <?php 
}

?>
