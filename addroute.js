
document.addEventListener("DOMContentLoaded", function() {
    populateRouteOptions();
    store_table();
  });
function populateRouteOptions() {
    // Fetch routes from the server
    fetch('fetchbusno.php')
      .then(response => response.json())
      .then(routes => {
        // Select the route dropdown
        var routeDropdown = document.getElementById("route");
         // Populate route options
        routes.forEach(function(route) {
          var option = document.createElement("option");
          option.value = route;
          option.textContent = route;
          routeDropdown.appendChild(option);
        });
      })
      .catch(error => console.error('Error fetching routes:', error));
  }
  
  function store_table(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("table").innerHTML = this.responseText;
      }
      else{
        console.log(this.responseText);
      }
    };
    xhttp.open("GET", "/pdlab/tableid.php", true);
    xhttp.send();
    // window.location.href='/pdlab/tableid.php';
  }