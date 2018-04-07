<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pocket Mart-Product Details</title>
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
    <b><p class="head">Products in Store</p></b>
<center>

  <table class="cust-table table-bordered table-hover" border="1px"> <tr><th>Product ID</th><th>Product Name</th><th>Rate</th><th>Available Quantity</th></tr>
    <?php
			$conn=mysqli_connect('localhost','root','','supermarket');

			$sql="select * from product";
			$result=mysqli_query($conn,$sql);
			if(!$result){echo mysqli_error($conn);}
			while($row=mysqli_fetch_array($result)){
        if($row['Stock']<=10){
          echo "<tr class='red'><td>".$row['Product_Id']."</td><td>".$row['Product_Name']."</td><td>".$row['Price']."</td><td>".$row['Stock']."</td></tr>";
        }
        else{
				  echo "<tr><td>".$row['Product_Id']."</td><td>".$row['Product_Name']."</td><td>".$row['Price']."</td><td>".$row['Stock']."</td></tr>";
        }
      }
	  ?>
  </table>
  <p>**The entries highlighted with red have less stock available.</p>
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
