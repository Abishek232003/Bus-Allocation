<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_routes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch routes from the database
$sql = "SELECT DISTINCT route FROM routes"; // Change routes_table to your actual table name
$result = $conn->query($sql);

// Array to store routes
$routes = array();

if ($result->num_rows > 0) {
    // Store routes in the array
    while($row = $result->fetch_assoc()) {
        $routes[] = $row['route'];
    }
}

// Close connection
$conn->close();

// Send routes as JSON response
header('Content-Type: application/json');
echo json_encode($routes);
?>
