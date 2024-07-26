<?php
if(!isset($POST['submit']))
{
    $user=$_POST['sname'];
    $mai=$_POST['mail'];
    $pass=$_POST['pas'];
    
    
        
        $con=mysqli_connect("localhost","root","","bus_routes");
        $sql="DELETE FROM datam where name='$user'AND email='$mai' AND pass='$pass'  ";
        $result=mysqli_query($con,$sql);
        
        echo "Deleted";
        
       
}



?> 