<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Bill Summary</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>


  <div class="nevbar">
		<div  class="nevdata">
			<div id="menu" class="menu">
					<div class="bar1"></div>
  				<div class="bar2"></div>
  				<div class="bar3"></div>
			</div>
			<div class="logout">
	      <form class="logout" action="logout.php" method="post">
	      	<button class="logoutbtn">Logout</button>
	      </form>
	    </div>
		</div>

	</div>
	<div id="menulist" class="menulist" style="display: none;">
		<table class="list table-bordered table-hover">
			<tr><td class="list-td"><a href="customerActivity.php">Customer Activity</a></td></tr>
			<tr><td class="list-td"><a href="new.php">Add/Update Product</a></td></tr>
			<tr><td class="list-td"><a href="product_manage.php">Products Availablity</a></td></tr>
		</table>
	</div>


	<div class="content">
    <?php
    $billid=$_GET['bill_id'];

    echo "<b><p class='head'> Summary of bill with bill-id:   ".$billid."</p></b><br>";
    ?>
    <center>
  <table class="cust-table table-bordered table-hover" border="1px"> <tr><th>Product Name</th><th>Rate</th><th>Quantity</th></tr>
  <?php

    $conn=mysqli_connect('localhost','root','','supermarket');

    $sql="select * from bill_summary where bill_id='".$billid."'";
    $result=mysqli_query($conn,$sql);
    if(!$result){echo mysqli_error($conn);}
    while($row=mysqli_fetch_array($result)){
      echo "<tr><td>".$row['pname']."</td><td>".$row['rate']."</td><td>".$row['quantity']."</td></tr>";
    }

		$sql_cid="select c_id from bill where bill_id='".$billid."'";
		$result_cid=mysqli_query($conn,$sql_cid);
		if(!$result_cid){echo mysqli_error($conn);}
		$row_cid=mysqli_fetch_array($result_cid);
		$cid=$row_cid['c_id'];
	?>
  </table>
	<div class="back">
		<?php

  echo "<form action='customerBill.php?cid=".$cid."' method='post'>";
	?>
    <button class="btn" type="submit">Back</button>
  </form>
</div>
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
