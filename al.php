<?php
 $usr="HKK@gmail.com";
 $pwd="hkk@123";

if(isset($_POST['uname']) && !empty($_POST['uname']) && isset($_POST['psw']) && !empty($_POST['psw']) ){

$uname=$_POST['uname'];
$psw=$_POST['psw'];

 
			if(($uname==$usr) && ($psw==$pwd) ){

				header('Location: index1.html');

				}else{

							echo "<br>login Invalid!! Try Again";
							}
	}else{
			echo "<br>Connot be left empty!";
			}
?>