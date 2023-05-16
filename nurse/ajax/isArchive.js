$(document).ready(function () {
  function loadDoc() {
    setInterval(function () {
      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          $(".logout").html(this.responseText);
          // document.getElementById("demo").innerHTML = this.responseText;
        }
      };

      xhttp.open("GET", "./includes/isArchive.php", true);

      xhttp.send();
    }, 1000);
  }

  loadDoc();
});
