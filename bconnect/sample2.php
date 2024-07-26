<?php
if(!isset($_POST['submit']))
{
     $sname=$_POST['sname']; 
     $mail=$_POST['mail']; 
     $pass=$_POST['pas'];
    $con=mysqli_connect("localhost","root","","bus_routes");
    $sql="INSERT INTO datam(name,email,pass)VALUES('$sname','$mail','$pass')";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        echo "ADDED SUCCESSFULLY";
    }
    else{
        echo "Failed";
    }
}
?>