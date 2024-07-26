<?php
$value = $_GET["value"];
$bus_needed = $_GET["bus_needed"];
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_routes";
$conn = mysqli_connect($servername, $username, $password, $database);
$query = mysqli_query($conn,"SELECT id from routes where route = '$value'");
$id = "";
if($query){
    $result = mysqli_fetch_array($query);
    $id = $result["id"];
}
else{
    echo mysqli_error($conn);
}
$query = mysqli_query($conn,"SELECT count(id) as c from bus_numbers where route_id = $id");
if($query){
    $result = mysqli_fetch_array($query);
    echo $result["c"]."<br>";
}
else{
    echo mysqli_error($conn);
}
$query = mysqli_query($conn,"SELECT bus_no,route from bus_numbers where route_id = $id LIMIT $bus_needed");
if($query){
    while($result = mysqli_fetch_array($query))
    {
        echo $result["bus_no"]."<br>";
        $route = $result['route'];
        $n = $result['bus_no'];
        $query1 = mysqli_query($conn,"INSERT INTO allocated_bus (busno, route)VALUES('$n', '$route')");
    }
}
else{
    echo mysqli_error($conn);
}
?>