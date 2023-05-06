$(document).ready(function () {

  $("#modal-overlay-container").hide();

  $(".add-appointment").click(function () {
    $("#modal-overlay-container").show();
    $("#modal-overlay-container").load("../modals/new-app-modal.php");
    // alert('clicked');
  });

  $("button[data-role=edit-se]").click(function () {

    let app_id = $(this).data("se_id");

    // alert(app_id);

    $("#modal-overlay-container").show();

    $("#modal-overlay-container").load("../modals/edit-app_modal.php", {
      app_id: app_id,
    });

  });


});
