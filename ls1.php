<?php
$dbhandle = mysqli_connect("localhost","root","")
or die("Unable to connect to MySQL"); 
echo ""; 
$selected = mysqli_select_db($dbhandle, "registration")
or die("Could not select examples");
if(isset($_REQUEST["submit"]))
{
    $email1=$_REQUEST["email1"];
    $pass=$_REQUEST["pass"];
    $query=mysqli_query($dbhandle,"select * from registration where email='$email1' && password='$pass'");
    $rowcount=mysqli_num_rows($query);
    if($rowcount==true)
    {
        header('Location: button1.html');
    }
    else{
        echo"Invalid";
    }

}
?>