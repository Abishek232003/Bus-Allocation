document.addEventListener("DOMContentLoaded", function() {
    storetable();
  });

function storetable(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("table").innerHTML = this.responseText;
      }
      else{
        console.log(this.responseText);
      }
    };
    xhttp.open("GET", "/pdlab/bconnect/allocated_seats.php", true);
    xhttp.send();
    // window.location.href='/pdlab/tableid.php';
  }