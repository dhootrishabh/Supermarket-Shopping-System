<?php
session_start();
	$conn=mysqli_connect('localhost','root','','supermarket');
	$uname=$_SESSION['uname'];

	$sql1="select Cust_id from customer where Cust_Name='".$uname."'";
	$result1=mysqli_query($conn,$sql1);
	if(!$result1){echo mysqli_error($conn);}
	$row1=mysqli_fetch_array($result1);
	$cid=$row1['Cust_id'];

	$sql2="select bill_id,paid from bill where c_id='".$cid."'";
	$result2=mysqli_query($conn,$sql2);
	if(!$result2){echo mysqli_error($conn);}
	$row2=mysqli_fetch_array($result2);
	$paid=$row2['paid'];

	if($row2['bill_id']==""){
		$login=0;
		$sql="update customer set login='".$login."' where username='".$uname."'";
		$result=mysqli_query($conn,$sql);
		if(!$result){echo mysqli_error();}
		header("Location:customer.html");
		session_destroy();
	}
	else{
	if($paid==1){
		$login=0;
		$sql="update customer set login='".$login."' where username='".$uname."'";
		$result=mysqli_query($conn,$sql);
		if(!$result){echo mysqli_error();}
		header("Location:customer.html");
		session_destroy();
	}
	else{
?>
<script type="text/javascript">
	alert("Please pay your to exit the store.");
	window.location.replace("bill.php");
</script>
<?php
	}
}
?>
