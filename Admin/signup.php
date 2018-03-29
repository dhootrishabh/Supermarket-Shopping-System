<?php
session_start();
	$conn=mysqli_connect('localhost','root','','supermarket');
	$aname=$_POST['newAdmin'];
	$aPass=$_POST['newPass'];
	$aRePass=$_POST['reNewPass'];

	$sql="select admin_name from admin where admin_name ='".$aname."'";
	$result=mysqli_query($conn,$sql);
	if(!$result){echo mysqli_error($conn);}
	$row=mysqli_fetch_array($result);
	if($row['admin_name']==""){
		if(!($aPass==$aRePass)){
?>
<script type="text/javascript">
	alert("Passwords do not match.Please try again.");
	window.location.replace('admin_login.html');
</script>
<?php

		}
		else{

			$sql="insert into admin(admin_name,password) values('$aname','$aPass')";
			$result=mysqli_query($conn,$sql);
			if(!$result){echo mysqli_error($conn);}
			$_SESSION['aname']=$aname;
			header("Location:customerActivity.php");
		}

	}
	else{
?>
<script type="text/javascript">
	alert("Username already resistered. Please try another username.");
	window.location.replace('admin_login.html');
</script>
<?php

	}


?>
