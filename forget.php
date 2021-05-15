<?php
session_start();
$dbhandle = mysqli_connect("localhost","root","")
or die("Unable to connect to MySQL"); 
echo ""; 

$selected = mysqli_select_db($dbhandle, "registration")
or die("Could not select examples");
$_SESSION['message']='';
if(isset($_REQUEST["submit"]))
{
    $email=$_REQUEST["email"];
    $sql="select * from registration where email='$email'";
    $result=mysqli_query($dbhandle,$sql);
    if(mysqli_num_rows($result))
    {
		$_SESSION['email']=$email;
        header("location:newpass.php");
    }
    else{
        echo '<script>alert("YOU ARE NOT A USER OF AKSHAA NATURE SO FAR! REGISTER TO JOIN US!")</script>';
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
			<label>Enter Your Email ID</label>
			<input type="text" name="email">
		</div>
		
		<div class="form-group">
			<button type="submit" name="submit" class="login-btn">Submit</button>
		</div>
		
	</form>
</body>
</html>