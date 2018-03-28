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
  <table class="bill-table table-bordered table-hover" border="1px"> <tr><th>Product Name</th><th>Rate</th><th>Quantity</th></tr>
  <?php
    session_start();
    $cname=$_SESSION['uname'];

    $conn=mysqli_connect('localhost','root','','supermarket');

    $sql_cid="select Cust_id from customer where Cust_Name='".$cname."'";
    $result_cid=mysqli_query($conn,$sql_cid);
    if(!$result_cid){echo mysqli_error($conn);}
    $row_cid=mysqli_fetch_array($result_cid);

    $sql_billid="select bill_id from bill where c_id='".$row_cid['Cust_id']."'";
    $result_billid=mysqli_query($conn,$sql_billid);
    if(!$result_billid){echo mysqli_error($conn);}
    $row_billid=mysqli_fetch_array($result_billid);

    $sql="select * from bill_summary where bill_id='".$row_billid['bill_id']."'";
    $result=mysqli_query($conn,$sql);
    if(!$result){echo mysqli_error($conn);}
    while($row=mysqli_fetch_array($result)){
      echo "<tr><td>".$row['pname']."</td><td>".$row['rate']."</td><td>".$row['quantity']."</td></tr>";
    }


  ?>
  </table>
</div>
</body>
</html>
