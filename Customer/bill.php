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
<center>
  <table class="bill-table table-bordered table-hover" border="1px"> <tr><th>Bill Id</th><th>Total Amount</th><th>Total Item</th><th>Paid/Unpaid</th></tr>
  <?php

    $cname=$_SESSION['uname'];

    $conn=mysqli_connect('localhost','root','','supermarket');

    $sql_cid="select Cust_id from customer where Cust_Name='".$cname."'";
    $result_cid=mysqli_query($conn,$sql_cid);
    if(!$result_cid){echo mysqli_error($conn);}
    $row_cid=mysqli_fetch_array($result_cid);

    $sql="select * from bill where c_id='".$row_cid['Cust_id']."'";
    $result=mysqli_query($conn,$sql);
    if(!$result){echo mysqli_error($conn);}
    while($row=mysqli_fetch_array($result)){
      if($row['paid']==0){
        $paid="Unpaid";
      }
      else{
        $paid="Paid";
      }
      echo "<tr><td><a href='bill_summary.php?bill_id=".$row['bill_id']."'>".$row['bill_id']."</a></td><td>".$row['amount']."</td><td>".$row['quantity']."</td><td>".$paid."</td></tr>";
    }


  ?>
  </table>
  <div class="pay">
    <table><tr><td>
  <form action="pay.php?pay=0" method="post">
    <button class="secbtn" type="submit">Pay Amount</button>
  </form></td>
  <td>
    <form action="customerIndex.php" method="post">
      <button class="secbtn" type="submit">Back</button>
    </form></td></tr></table>
</div>
</center>
</div>
</body>
</html>
