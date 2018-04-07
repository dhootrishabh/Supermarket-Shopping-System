<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pocket Mart-Customer Activity</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="adminstyles.css">

</head>
<body>


<div class="nevbar">
	<div  class="nevdata">
		<div id="menu" class="menu">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
		</div>
    <div>
      <p class="name">Pocket Mart </p>
    </div>
    <div class="menulist" style="display: none;">
      <div class="list list-group">
        <a href="customerActivity.php" class="list-group-item list-group-item-action">Customer Activity</a>
        <a href="product_manage.php" class="list-group-item list-group-item-action">Product List</a>
        <a href="new.php" class="list-group-item list-group-item-action">Add/Update Product</a>
        <a href="logoutAdmin.php" class="list-group-item list-group-item-action">Logout</a>
      </div>

    </div>
	</div>
</div>



	<div class="content">
		<b><p class='head'>Customers present in the store</p></b><br>
<center>
  <table class="cust-table table-bordered table-hover" border="1px"> <tr><th>Customer ID</th><th>Customer Name</th></tr>
    <?php
			$count=0;
			$conn=mysqli_connect('localhost','root','','supermarket');
			$login=1;
			$sql_cid="select * from customer where login='".$login."'";
			$result_cid=mysqli_query($conn,$sql_cid);
			if(!$result_cid){echo mysqli_error($conn);}
			while($row_cid=mysqli_fetch_array($result_cid)){
				$count=$count+1;
				echo "<tr><td><a href='customerBill.php?cid=".$row_cid['Cust_id']."'>".$row_cid['Cust_id']."</a></td><td>".$row_cid['Cust_Name']."</td></tr>";
			}


	echo "</table><br><br><br><table class='cust-table table-bordered table-hover'> <tr><th>Customer Count</th><th>".$count."</th></tr></table>";
	?>
</center>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
	<script>
		$(document).ready(function(){
			$(".menu").click(function(){
				$(".menulist").toggle();
			});
		});
	</script>


</body>
</html>
