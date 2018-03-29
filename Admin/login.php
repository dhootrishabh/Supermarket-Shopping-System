<?php
session_start();
	$conn=mysqli_connect('localhost','root','','supermarket');

	$aname=$_POST['adminid'];
	$aPass=$_POST['password'];

	$sql="select admin_name,password from admin where admin_name ='".$aname."'";
	$result=mysqli_query($conn,$sql);
	if(!$result){echo mysqli_error($conn);}
	$row=mysqli_fetch_array($result);
	if($row['admin_name']==""){

?>
<script type="text/javascript">
	alert("User not Registered.");
	window.location.replace('admin_login.html');
</script>
<?php
	}
	else{
			if($row['password']==$aPass){


				$_SESSION['aname']=$aname;
				header("Location:customerActivity.php");
			}
			else{
?>
<script type="text/javascript">
	alert("Incorrect Username or Password. Please enter corret username and password.");
	window.location.replace('admin_login.html');
</script>
<?php
			}

		}
?>
