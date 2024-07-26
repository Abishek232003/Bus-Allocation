
<?php




if(!isset($POST['submit']))
{
    $user=$_POST['sname'];
    $mai=$_POST['mail'];
    $pass=$_POST['pas'];
    $con=mysqli_connect("localhost","root","","bus_routes");
    $sql="SELECT * from datam where name='$user' AND email='$mai' AND pass='$pass' ";
    $result=mysqli_query($con,$sql);
    $resultcheck=mysqli_num_rows($result);
    if($resultcheck>0)
    {
        
        header("Location: \pdlab\index.html");
 
        exit;
    }
    else{
        header("Location: fail.html");
 
        exit;
    }
}



?> 