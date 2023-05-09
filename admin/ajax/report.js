$(document).ready(function(){

   if($('#range').val() == '' && $('#type').val() == ''){

      $('#report-content-container').html("Select type of report and date range.");

   }

   $('#range').change(function(){

      let range = $(this).val();
      let type = $("#type").val();

      if(type != '' && range != ''){
         
         switch (type) {
         
            case "appointments":

               $('#report-content-container').load('../ajax/pages/report_appointment.php',{
                  type: type,
                  range: range
               })
               break;

            case "consultation":

               $('#report-content-container').load('../ajax/pages/report_consultation.php',{
                  type: type,
                  range: range
               })
               break;

            case "medicine":

               $('#report-content-container').load('../ajax/pages/report_medicine.php',{
                  type: type,
                  range: range
               })
               break;

            default:
               break;
         }
         
      } else if (range == '' && type != '') {

         $('#report-content-container').html("Select date range");

      } else {

         $('#report-content-container').html("Select type of report and date range.");

      }

      
      
   });

   $('#type').change(function(){

      let type = $(this).val();
      let range = $("#range").val();

      if(type != '' && range != ''){
         
         switch (type) {
         
            case "appointments":

               $('#report-content-container').load('../ajax/pages/report_appointment.php',{
                  type: type,
                  range: range
               })
               break;

            case "consultation":

               $('#report-content-container').load('../ajax/pages/report_consultation.php',{
                  type: type,
                  range: range
               })
               break;

            case "medicine":

               $('#report-content-container').load('../ajax/pages/report_medicine.php',{
                  type: type,
                  range: range
               })
               break;

            default:
               break;
         }
         
      } else if (type == '' && range != '') {

         $('#report-content-container').html("Select type");

      } else {

         $('#report-content-container').html("Select type of report and date range.");

      }

   });

});