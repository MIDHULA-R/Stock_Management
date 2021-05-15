<?php
if(isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['gender']) || isset($_POST['number']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['password1']))
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password1 = $_POST['password1'];

	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender,number, email, password,password1) values(?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssisss", $firstName, $lastName, $gender,$number, $email, $password, $password1);
		$execval = $stmt->execute();
		
		echo "<h1>Registration Successful!!</h1>";
		$stmt->close();
		$conn->close();
	}
?>