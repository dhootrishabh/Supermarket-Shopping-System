<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}
$conn=mysqli_connect('localhost','root','','supermarket');

$pname=$_POST['product'];
$price=$_POST['price'];
$stock=$_POST['stock'];
if($pname==""){
	?>
	<script type="text/javascript">
		alert("Product name cannot be empty.");
		window.location.replace("new.php");
	</script>
	<?php
}

$sql="select Product_Id from product where Product_Name='".$pname."'";
$result=mysqli_query($conn,$sql);
if(!$result){echo mysqli_error($conn);}
$row=mysqli_fetch_array($result);
if($row['Product_Id']==""){

	$sql_insert="insert into product(Product_Name,Price,Stock) values('$pname','$price','$stock')";
	$result_insert=mysqli_query($conn,$sql_insert);
	if(!$result){echo mysqli_error($conn);}
	header("Location:new.php");
}
else{

	if($stock==""){

		$sql_update="update product set Price=".$price." where Product_Id='".$row['Product_Id']."'";
		$result_update=mysqli_query($conn,$sql_update);
		if(!$result){echo mysqli_error($conn);}
		header("Location:new.php");
	}
	else if ($price=="") {

		$sql_update="update product set Stock=".$stock." where Product_Id='".$row['Product_Id']."'";
		$result_update=mysqli_query($conn,$sql_update);
		if(!$result){echo mysqli_error($conn);}
		header("Location:new.php");
	}
	else{

		$sql_update="update product set Stock=".$stock.",Price=".$price." where Product_Id='".$row['Product_Id']."'";
		$result_update=mysqli_query($conn,$sql_update);
		if(!$result){echo mysqli_error($conn);}
		header("Location:new.php");
	}
}

?>
