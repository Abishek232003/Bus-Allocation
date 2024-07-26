
<?php
if(!isset($POST['submit']))
{
    $user=$_POST['sname'];
    $mai=$_POST['mail'];
    $pass=$_POST['pas'];
    $npass=$_POST['pas1'];
    
        
        $con=mysqli_connect("localhost","root","","bus_routes");
        $sql="UPDATE datam SET pass='$npass' where name='$user' ";
        $result=mysqli_query($con,$sql);
        
        
       
}



?> 