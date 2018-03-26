<?php
session_start();
	$conn=mysqli_connect('localhost','root','','supermarket');
    $newName=$_POST['newName'];
	$uname=$_POST['newUser'];
	$uPass=$_POST['newPass'];
	$uRePass=$_POST['reNewPass'];

	$sql="select username from customer where username ='".$uname."'";
	$result=mysqli_query($conn,$sql);
	if(!$result){echo mysqli_error($conn);}
	$row=mysqli_fetch_array($result);
	if($row['username']==""){
		if(!($uPass==$uRePass)){
?>
<script type="text/javascript">
	alert("Passwords do not match.Please try again.");
	window.location.replace('customer.html');	
</script>
<?php

		}
		else{
			$login=1;
			$sql="insert into customer(Cust_Name,username,password,login) values('$newName','$uname','$uPass','$login')";
			$result=mysqli_query($conn,$sql);
			if(!$result){echo mysqli_error($conn);}
			$_SESSION['uname']=$uname;
			header("Location:customerIndex.html");
		}

	}
	else{
?>
<script type="text/javascript">
	alert("Username already resistered. Please try another username.");
	window.location.replace('customer.html');
</script>
<?php
		
	}


?>
