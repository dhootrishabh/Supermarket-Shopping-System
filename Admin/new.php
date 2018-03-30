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
      <div class="menulist" style="display: none;">
        <div class="list list-group">
          <a href="customerActivity.php" class="list-group-item list-group-item-action">Customer Activity</a>
          <a href="product_manage.php" class="list-group-item list-group-item-action">Product List</a>
          <a href="new.php" class="list-group-item list-group-item-action">Add/Update Product</a>
          <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
        </div>
      </div>
  	</div>
  </div>

	<div class="content">
<center>
	<br><br>
	<div id="new">
		<b><p id='head'>Product Information</p></b><br>
		<form id="newForm" action="product.php" method="post">
		<p>Product <input type="text" name="product" id="newProduct"><br></p>
		<p>Price <input type="text" name="price" id="cost"><br></p>
		<p>Stock <input type="text" name="stock" id="stock"><br></p>
		<button class="btn" type="submit">Add Product</button>
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
