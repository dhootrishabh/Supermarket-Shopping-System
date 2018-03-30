<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Bills</title>
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

    <?php
    $cid=$_GET['cid'];
    $conn=mysqli_connect('localhost','root','','supermarket');

    $sql_cname="select Cust_Name from customer where Cust_id='".$cid."'";
    $result_cname=mysqli_query($conn,$sql_cname);
    if(!$result_cname){echo mysqli_error($conn);}
    $row_cname=mysqli_fetch_array($result_cname);
    echo "<b><p class='head'>Bill History of ".$row_cname['Cust_Name']."</p></b><br>";
    ?>
    <center>
  <table class="cust-table table-bordered table-hover" border="1px"> <tr><th>Bill ID</th><th>Total Amount</th><th>Total Item</th><th>Paid/Unpaid</th></tr>
  <?php

    $sql="select * from bill where c_id='".$cid."'";
    $result=mysqli_query($conn,$sql);
    if(!$result){echo mysqli_error($conn);}
    while($row=mysqli_fetch_array($result)){
      if($row['paid']==0){
        $paid="Unpaid";
      }
      else{
        $paid="Paid";
      }
      echo "<tr><td><a href='customerBillSummary.php?bill_id=".$row['bill_id']."'>".$row['bill_id']."</a></td><td>".$row['amount']."</td><td>".$row['quantity']."</td><td>".$paid."</td></tr>";
    }


  ?>

  </table>
	<div class="back">
  <form action="customerActivity.php" method="post">
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
