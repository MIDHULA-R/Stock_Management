<?php

$dbhandle = mysqli_connect("localhost","root","")
or die("Unable to connect to MySQL"); 
echo ""; 
session_start();


$selected = mysqli_select_db($dbhandle, "admin")
or die("Could not select examples");
$_SESSION['message']='';
if(isset($_REQUEST["submit"]))
{
    $firstName=$_REQUEST["firstName"];
    $password=$_REQUEST["password"];
    $sql="select * from admin where firstName='$firstName' && password='$password'";
    $result=mysqli_query($dbhandle,$sql);
    if(mysqli_num_rows($result))
    {
		$_SESSION['firstName']=$firstName;
        header("location:button.html");
    }
    else{
        echo '<script>alert("WRONG CREDENTIALS !")</script>';
    }

}
?>


