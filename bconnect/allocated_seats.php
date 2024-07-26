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
$query = mysqli_query($conn,"SELECT busno, route FROM allocated_bus");

// Check if query was successful
if($query){
    // Echo CSS styling
    echo "
    <style>
    /* Styles for the table */
    table {
        margin-left: 10%;
        width: 80%;
        border-collapse: collapse;
        border-spacing: 0;
        background-color: #ffffff;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
        border-radius: 10px; /* Rounded border */
    }

    /* Styles for table header */
    tbody th {
        align-content: center;
        color:#ffffff;
        background-color:#000;
        font-weight: bold;
        text-align: left;
        padding: 10px;
        border-radius: 10px; /* Rounded border */
    }

    /* Styles for table data */
    tbody td {
        padding: 10px;
        border-radius: 10px; /* Rounded border */
    }

    /* Alternate row background color */
    tbody tr:nth-child(even) {
        background-color: rgb(244, 142, 142);
    }
    tbody tr:nth-child(odd) {
        background-color: rgb(0, 0, 0);
        color:rgb(244, 142, 142);
    }

    /* Hover effect */
    
</style>

    ";

    // Echo the table structure
    echo "<table border='1'>";
    echo "<tr><th>Bus Number</th><th>Route</th></tr>";
    // Output data of each row
    while($result = mysqli_fetch_assoc($query)){
        echo "<tr><td>".$result["busno"]."</td><td>".$result["route"]."</td></tr>";
    }
    echo "</table>";
} else {
    // If query fails, display error
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
