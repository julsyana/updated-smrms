<?php
    include "../includes/db_conn.php";
    include "../includes/date.php";
    include "../functions/appointment.php";

    $app_type = $_POST['app_type'];

    try {

        $app_id = "se".generateAppID(14);

        $idToUpper = strtoupper($app_id);
        
        $insApp = insApp($conn, $idToUpper, $app_type, $date_today);

        if($insApp){

            ?>

            <div class="message-modal" id="message-modal">

                <h3> Successfully added new <?=$app_type?> appointment.  </h3>

                <div class="icon">
                <i class="fas fa-check-circle"> </i>
                </div>

            </div>

            <script>
                window.location.href = "./appointment.php";
            </script>

            <?php 

        } else {
            
            echo "Inserted Failed ".mysqli_error($conn);
        }

    } catch (\Throwable $th) {

        echo "Inserted Failed ".mysqli_error($conn);

    }
?>