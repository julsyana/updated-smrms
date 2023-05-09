
<?php
    include "../includes/db_conn.php";
    include "../functions/appointment.php";

    $app_id = $_POST['app_id'];

    $appRes = selApp($conn, $app_id);

    $allStudentsPerService = selStudPerService($conn, $app_id);
    
?>

<div class="modal-container edit-appointment-container" id="edit-appointment-container">
    
    <div class="modal-header">
       <h3> <i class="fas fa-edit    "></i> Edit <?=$appRes['app_type']?> Details <span id="app-mess"></span> </h3>
    </div>
    

    <div class="modal-content">

        <form id="edit-appointment-form">

            <div class="se-details">
                
                <div class="form-input">
                  <label for="app-slot"> Service ID: </label>
                  <p> <b> <?=$appRes['app_id']?> </b></p>
                  <input type="text" name="app_id" value="<?=$appRes['app_id']?>" readonly hidden> 
                </div>

                <div class="form-input">
                   <label for="app-type"> Service Type: </label>
                   <!-- <input type="text" name="app_type" value="<?=$appRes['app_type']?>" readonly>  -->
                   <p> <b> <?=$appRes['app_type']?> </b></p>
                </div>
     
            </div>
        
            <div class="app-status">
                
                <div class="form-input">
                    <label for="app-status"> Status: </label>
                    
                    <select name="app_status" id="app-status">
                        <?php 
                            if($appRes['status'] == 1){?>
        
                                <option value="1"> On </option>
                                <option value="0"> Off </option>
                                
                            <?php } else { ?>
        
                                <option value="0"> Off </option>
                                <option value="1"> On </option>
                                                                                
                            <?php 
                            }
                        ?>
                    </select>
                </div>

                <div class="students-email">
            
                </div>
                
            </div>
 
            <div class="form-button">

                <button type="button" id="edit-app-cancel"> Cancel </button>

                <!-- <button type="button" id="archive-app-btn"> <i class="fas fa-archive"></i> Archive </button> -->
                
                <button type="submit" id="edit-app-save" disabled> 
                    <div class="text">
                        <i class="fas fa-save"></i> 
                        Save Changes 
                    </div>

                    <div class="loader">
                        <img src="../../student/assets/loading.gif" alt="">
                    </div>
                    
                </button>

            </div>
        </form>
        
    </div>

</div>


<script>
   $(document).ready(function(){

      $('#edit-app-cancel').click(function(){

          $("#modal-overlay-container").hide();

          $('#edit-appointment-container').hide();

      });

      $('#edit-appointment-form').submit(function(e){

        e.preventDefault();

        const form = $('#edit-appointment-form')[0];
        const formData = new FormData(form);

     
        let confirmYes = confirm("Are you sure, you want to save this changes from <?=$appRes['app_type']?>?");

        if(confirmYes){

            // $('.loader').show();
            $('.loader').css('display', 'flex');
            $('#edit-app-save .text').html('Sending Email...');


            $('#edit-app-save').attr('disabled', true);
            $('#edit-app-cancel').attr('disabled', true);



            $.ajax({
                type: "POST",
                url: "../process/edit_service.php",
                data: formData,
                contentType: false, 
                processData: false,
                cache: false,
                success: function(data){

                    // $('.students-email').html(data);
                    $('#edit-app-save .text').html('<i class="fas fa-envelope"></i> Email Sent');
                    $('.loader').css('display', 'none');

                    setTimeout(function(){

                        window.location.href = "./appointment.php";

                    }, 500);
                   

                }

            });
        }

      });


      $('#app-status').change(function(){

        let se_status = $(this).val();

        const se_id = "<?=$app_id?>";

        $('#edit-app-save').attr('disabled', false);

        $('.students-email').load('../ajax/pages/student-per-service.php',{
            
            se_id: se_id
        });

      });

   });

</script>


