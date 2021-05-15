<?php
if(isset($_POST['cun']) || isset($_POST['com']) || isset($_POST['pn']) || isset($_POST['email']) || isset($_POST['prd']) || isset($_POST['ddate']))
	$cun = $_POST['cun'];
	$com = $_POST['com'];
	$pn = $_POST['pn'];
	$email = $_POST['email'];
	$prd = $_POST['prd'];
	$ddate = $_POST['ddate'];

	// Database connection
	$conn = new mysqli('localhost','root','','customer');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer(cun,com,pn,email,prd,ddate) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssisss", $cun, $com ,$pn, $email, $prd ,$ddate);
		$execval = $stmt->execute();
		echo "Your Record is Saved !!We will contact you Soon";
		$stmt->close();
		$conn->close();
	}
?>