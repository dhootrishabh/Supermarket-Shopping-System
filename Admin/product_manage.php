<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
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
