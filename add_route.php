<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_routes";

// Get data from POST request
$route = $_POST["route"];
$capacity = $_POST["capacity"];


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the route already exists in the database
$sql = "SELECT * FROM routes WHERE route = '$route'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Route already exists
    echo "Route '$route' already exists!";
} else {
    // Route doesn't exist, insert into the database
    $sql = "INSERT INTO routes (route, capacity) VALUES ('$route', $capacity)";

    if ($conn->query($sql) === TRUE) {
        echo "Route '$route' added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
