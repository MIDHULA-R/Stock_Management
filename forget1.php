<?php
session_start();
$dbhandle = mysqli_connect("localhost","root","")
or die("Unable to connect to MySQL"); 
echo ""; 

$selected = mysqli_select_db($dbhandle, "admin")
or die("Could not select examples");
$_SESSION['message']='';
if(isset($_REQUEST["submit"]))
{
    $firstName=$_REQUEST["firstName"];
    $sql="select * from admin where firstName='$firstName'";
    $result=mysqli_query($dbhandle,$sql);
    if(mysqli_num_rows($result))
    {
		$_SESSION['firstName']=$firstName;
        header("location:newpass1.php");
    }
    else{
        echo '<script>alert("YOU ARE NOT AN ADMIN!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<form class="login-form" method="post">
		<h2 class="form-title">RESET PASSWORD</h2>
				<div class="form-group">
			<label>Enter Your First Name</label>
			<input type="text" name="firstName">
		</div>
		
		<div class="form-group">
			<button type="submit" name="submit" class="login-btn">Submit</button>
		</div>
		
	</form>
</body>
</html>