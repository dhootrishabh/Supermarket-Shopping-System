<?php
session_start();
	$conn=mysqli_connect('localhost','root','','supermarket');
	$uname=$_SESSION['uname'];
	
	$login=0;
	$sql="update customer set login='".$login."' where username='".$uname."'";
	$result=mysqli_query($conn,$sql);
	if(!$result){echo mysqli_error();}
	header("Location:customer.html");
	session_destroy();

?>
