<?php
session_start();
	$conn=mysqli_connect('localhost','root','','supermarket');

	$uname=$_POST['userid'];
	$uPass=$_POST['password'];

	$sql="select username,password from customer where username ='".$uname."'";
	$result=mysqli_query($conn,$sql);
	if(!$result){echo mysqli_error($conn);}
	$row=mysqli_fetch_array($result);
	if($row['username']==""){

?>
<script type="text/javascript">
	alert("User not Registered.");
	window.location.replace('customer.html');
</script>
<?php
	}
	else{
			if($row['password']==$uPass){
				$login=1;
				$sql1="update customer set login='".$login."' where username='".$uname."'";
				$result1=mysqli_query($conn,$sql1);
				if(!$result1){echo mysqli_error();}
				$_SESSION['uname']=$uname;
				header("Location:customerIndex.php");
			}
			else{
?>
<script type="text/javascript">
	alert("Incorrect Username or Password. Please enter corret username and password.");
	window.location.replace('customer.html');
</script>
<?php
			}

		}
?>
