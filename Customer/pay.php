<?php
  session_start();
  if($_SESSION['uname']==""){
    header("Location:customer.html");
  }
  $cname=$_SESSION['uname'];

  $conn=mysqli_connect('localhost','root','','supermarket');

  $sql_cid="select Cust_id from customer where Cust_Name='".$cname."'";
  $result_cid=mysqli_query($conn,$sql_cid);
  if(!$result_cid){echo mysqli_error($conn);}
  $row_cid=mysqli_fetch_array($result_cid);

  if($_GET['pay']==1){
    $paid=1;
    $sql_pay="update bill set paid='".$paid."' where c_id='".$row_cid['Cust_id']."'";
    $result_pay=mysqli_query($conn,$sql_pay);
    if(!$result_pay){echo mysqli_error($conn);}
    header("Location:customerIndex.php");
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
  <table class="bill-table table-bordered" border="1px"> <tr><th colspan="2">Payment</th></tr>
    <tr><td>Total Amount</td>
  <?php


    $paid=0;
    $sql_billid="select bill_id,amount from bill where c_id='".$row_cid['Cust_id']."' and paid='".$paid."'";
    $result_billid=mysqli_query($conn,$sql_billid);
    if(!$result_billid){echo mysqli_error($conn);}
    $row_billid=mysqli_fetch_array($result_billid);


    echo "<td>Rs.".$row_billid['amount']."</td></tr>";
  ?>
</table>
<form action="pay.php?pay=1" method="post">
  <table class="bill-table"><tr><td>
  <button class="secbtn" type="submit">Pay Now</button></td><td>
  <button class="secbtn" type="submit">Back</button></td></tr></table>
</div>
</body>
</html>
