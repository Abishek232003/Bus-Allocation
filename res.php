


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_routes";

if(!isset($POST['submit']))
{
    $con=mysqli_connect($servername, $username, $password, $database);
    
      $sql="DELETE FROM allocated_bus";

    $sql2="ALTER TABLE allocated_bus AUTO_INCREMENT = 1";
   
  
    $result=mysqli_query($con,$sql);

    $result1=mysqli_query($con,$sql2);

    header("Location: allocate_seats.html");
}
?>