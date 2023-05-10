$(document).ready(function(){

   if($('#range').val() == '' && $('#type').val() == ''){

      $('#report-content-container').html("<h1> Select type of report and date range. </h1>");

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

         $('#report-content-container').html("<h1> Select date range </h1>");

      } else {

         $('#report-content-container').html("<h1> Select type of report and date range. </h1>");

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

         $('#report-content-container').html("<h1> Select type of report </h1>");

      } else {

         $('#report-content-container').html("<h1> Select type of report and date range. </h1>");

      }

   });

});