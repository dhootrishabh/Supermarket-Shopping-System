<?php
session_start();
if($_SESSION['uname']==""){
  header("Location:customer.html");
}

?>
<html>
<head>
    <title>Customer Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<div class="nevbar">
  <div class="nevdata">
    <div  class="bill">
      <form class="bill" action="bill.php" method="post">
        <button class="logoutbtn">Bill History</button>
      </form>
    </div>
    <div class="logout">
      <form class="logout" action="logout.php" method="post">
      	<button class="logoutbtn">Logout</button>
      </form>
    </div>
  </div>
</div>
<div class="body-content">
<div class="purchase_form">
  <form action="purchase.php" method="post">
    <table class="purchase-table">
      <tr><th colspan="2" class="form-head">Purchase Products</th></tr>
      <tr><td colspan="2"></td><tr>
      <tr><td><p>Enter Product ID</p></td><td><input type="text" name="product_id"></td></tr>
      <tr><td><p>Quantity</p></td><td><input type="text" name="quantity"></td></tr>
      <tr><td colspan="2" class="submit-button"><button class="secbtn" type="submit">Buy</button></td>
    </table>
  </form>
</div>
</body>
</html>
