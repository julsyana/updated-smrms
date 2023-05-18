<div class="settings-med-container">

   <div class="settings-container-header">
      <p> <i class="fas fa-cog    "></i> Settings  </p>
   </div>

   <form enctype="multipart/form-data" id="settings">

      <div class="form-input">
         <label for="set-type"> Set type </label>
         <select name="set_type" id="set-type" required>
            <option value=""> --Select type-- </option>
            <option value="stock"> Stocks </option>
            <option value="expDate"> Expiration Date </option>
         </select>
      </div>

      <div class="output" id="output">

      </div>

      <div class="form-button">
          <div id="sample-mess">

          </div>
         <button type="button" id="setting-cancel"> Cancel </button>
         <button type="submit" id="submit-setting"> 
            <img src="../assets/loading.gif" alt="">
            <p> Submit </p>
         </button>
      </div>

   </form>

</div>

<script>
   $(document).ready(function(){

      $('#setting-cancel').click(function(){

         $('#medicine-modal-container').hide();
         $('#medicine-modal-container').css('display', 'none');

      });

      $('#set-type').change(function(){

         let type = $(this).val();

         if(type != ""){

            $('#output').load("../ajax/pages/settings.php", {
               type: type,
            });
         } else {
            $('#output').html("");
         }

      });


      


      // when form is submitted
      $('#settings').submit(function(e){

         e.preventDefault(); // prevent load page

         const form = $('#settings')[0];
         const formData = new FormData(form);


         let isConfirm = confirm("Are you sure you want to submit?");

         if(isConfirm){


            $('#submit-setting').attr('disabled', true);
            $('#submit-setting img').css('display', 'flex');

            $('#submit-setting p').text("Submitting...");

            
            $.ajax({

               type: "POST",
               url: "../process/critical_level.php",
               data: formData,
               contentType: false, 
               processData: false,
               cache: false,
               success: function (data) {

                  setInterval(function(){
                     window.location.href = "./medicine.php";
                  }, 3000)
   
               },

            });
         }

         // ajax

         // $.ajax({

         //    url: "../process/add_medicine.php",
         //    type: "POST",
         //    data: formData,
         //    contentType: false, 
         //    processData: false,
         //    cache: false,
         //    success: function (data) {

         //       $('#medicine-modal-container').hide();

         //       $('#medicine-message-modal').show();

         //       $('#medicine-message-modal').html(data);

         //      window.location.href = "../pages/medicine.php";

         //    },


         // });

      });



   });
</script>
