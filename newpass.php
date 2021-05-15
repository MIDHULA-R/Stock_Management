<?php
session_start();
$dbhandle = mysqli_connect("localhost","root","")
or die("Unable to connect to MySQL"); 
echo ""; 
$selected = mysqli_select_db($dbhandle, "registration")
or die("Could not select examples");
$_SESSION['message']='';
if(isset($_REQUEST["login"]))
{
	
    $email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$password1=$_REQUEST["password1"];
	if($password==$password1){
	$sql=mysqli_query($dbhandle,"UPDATE registration set password='$password' , password1='$password1' where email='$email'");
    echo '<script>alert("YOUR PASSWORD HAS BEEN UPDATED!")</script>';
	}
	else
	{
		echo '<script>alert("RETYPE YOUR PASSWORD CORRECTLY!")</script>';
	}
		
		
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<form class="login-form" method="post">
		<h2 class="form-title">PASSWORD RESET</h2>
		
		<div class="form-group">
			<label>EMAIL</label>
			<input type="text" name="email">
		</div>
		<div class="form-group">
			<label>NEW PASSWORD</label>
			<input type="password" name="password">
		</div>
		<div class="form-group">
			<label>CONFIRM PASSWORD</label>
			<input type="password" name="password1">
		</div>
		<div class="form-group">
			<button type="submit" name="login" class="login-btn">Submit</button>
		</div>
		
	</form>
</body>
</html>