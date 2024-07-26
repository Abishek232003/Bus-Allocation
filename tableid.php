<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_routes";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select data from routes table
$query = mysqli_query($conn,"SELECT id, route FROM routes");

// Check if query was successful
if($query){
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Route</th></tr>";
    // Output data of each row
    while($result = mysqli_fetch_assoc($query)){
        echo "<tr><td>".$result["id"]."</td><td>".$result["route"]."</td></tr>";
    }
    echo "</table>";
} else {
    // If query fails, display error
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
