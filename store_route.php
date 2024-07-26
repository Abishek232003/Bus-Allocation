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

// Get data from form
$route = $_POST['route'];
$capacity = $_POST['capacity'];

// Insert data into database
$sql = "INSERT INTO routes (route, capacity) VALUES ('$route', $capacity)";

if ($conn->query($sql) === TRUE) {
    echo "Route added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
