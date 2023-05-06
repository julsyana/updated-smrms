$(document).ready(function(){

   $('#search_app').keyup(function(){
      
      let sort = $('#sort_app').val();
      let search = $(this).val();
      

      $('.table').load('./php_ajax/search_appointments.php', {
         sort: sort,
         search:search,
      });

   });


   $('#sort_app').change(function(){
   
      let sort = $(this).val();
      let search = $('#search_app').val();

      $('.table').load('./php_ajax/sort_appointments.php', {
         sort:sort,
         search: search
      });

   });

});