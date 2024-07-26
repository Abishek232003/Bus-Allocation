// document.addEventListener("DOMContentLoaded", function() {
//     populateRouteOptions();
//   });
  
//   function populateRouteOptions() {
//     // Retrieve routes from localStorage
//     var routes = JSON.parse(localStorage.getItem("routes")) || [];
  
//     // Select the route dropdown
//     var routeDropdown = document.getElementById("route");
  
//     // Populate route options
//     routes.forEach(function(route) {
//       var option = document.createElement("option");
//       option.value = route;
//       option.textContent = route;
//       routeDropdown.appendChild(option);
//     });
//   }
  // const {axios} = require('axios');
  async function calculateBuses() {
    
    var route = document.getElementById("route").value;
    var studentCount = parseInt(document.getElementById("studentCount").value);
  
    // Here goes your logic to calculate the number of buses needed
    // For demonstration purposes, let's assume the number of buses needed is fixed
    var busesNeeded = Math.floor(studentCount/50);
    // const result = await axios.post('')
    // window.location.href='/pdlab/get_busno.php?value='+route;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("busCount").innerHTML = "Total Bus Count :" + this.responseText;
      }
    };
    xhttp.open("GET", "/pdlab/get_busno.php?value="+route+"&bus_needed="+busesNeeded, true);
    xhttp.send();
    // Display the result
    document.getElementById("result").style.display = "block";
  }

  document.addEventListener("DOMContentLoaded", function() {
    populateRouteOptions();
  });
 
  function populateRouteOptions() {
    // Fetch routes from the server
    fetch('fetch_routes.php')
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
  
//   function calculateBuses() {
//     var route = document.getElementById("route").value;
//     var studentCount = parseInt(document.getElementById("studentCount").value);
  
//     // Here goes your logic to calculate the number of buses needed
//     // For demonstration purposes, let's assume the number of buses needed is fixed
//     var busesNeeded = 2;
  
//     // Display the result
//     document.getElementById("busCount").textContent = "Number of buses needed: " + busesNeeded;
//     document.getElementById("result").style.display = "block";
//   }