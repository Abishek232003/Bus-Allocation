<?php
// Retrieve form data
$route = $_POST['route'];
$studentCount = $_POST['studentCount'];

// Fetch seat capacity from database based on selected route
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_routes";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT capacity FROM routes WHERE route='$route'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $capacity = $row["capacity"];
} else {
    $capacity = 0;
}

$sql = "SELECT id, route FROM routes";
$route = $conn->query($sql);

if ($route->num_rows > 0) {
    // Output data of each row
    while($row = $route->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Route " . $row["route"]."<br>";
    }
} else {
    echo "0 results";
}

// Allocate seats
$seatsAllocated = min($studentCount, $capacity);

// Construct HTML to display the result
$html = "<h2>Seat Allocation Result</h2>";
$html .= "<p>Route: $route</p>";
$html .= "<p>Student Count: $studentCount</p>";
$html .= "<p>Seat Capacity: $capacity</p>";
$html .= "<p>Seats Allocated: $seatsAllocated</p>";

// Output the HTML
echo $html;

// Close connection
$conn->close();
?>
