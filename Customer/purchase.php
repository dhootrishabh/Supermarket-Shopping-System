<?php
session_start();
if($_SESSION['uname']==""){
  header("Location:customer.html");
}
$conn=mysqli_connect('localhost','root','','supermarket');
$pid=$_POST['product_id'];
$quantity=$_POST['quantity'];
$cname=$_SESSION['uname'];

$sql="select Cust_id from customer where Cust_Name='".$cname."'";
$result=mysqli_query($conn,$sql);
if(!$result){echo mysqli_error($conn);}
$row=mysqli_fetch_array($result);
$cid=$row['Cust_id'];

$sql1="select * from product where Product_Id='".$pid."'";
$result1=mysqli_query($conn,$sql1);
if(!$result1){echo mysqli_error($conn);}
$row1=mysqli_fetch_array($result1);

$pqty=$row1['Stock']-$quantity;

$sql_product="update product set Stock='".$pqty."' where Product_Id='".$pid."'";
$result_product=mysqli_query($conn,$sql_product);
if(!$result_product){echo mysqli_error($conn);}

$amount=$row1['Price']*$quantity;
$paid=0;
$sql2="select bill_id,amount,quantity from bill where c_id='".$cid."' and paid='".$paid."'";
$res=mysqli_query($conn,$sql2);
if(!$res){echo mysqli_error($conn);}
$row2=mysqli_fetch_array($res);

if($row2['bill_id']==""){
  $sql_insert="insert into bill(c_id,amount,quantity,paid) values('".$cid."','".$amount."','".$quantity."','".$paid."')";
  $result_insert=mysqli_query($conn,$sql_insert);
  if(!$result_insert){echo mysqli_error($conn);}

  $sql3="select bill_id from bill where c_id='".$row['Cust_id']."' and paid='".$paid."'";
  $result3=mysqli_query($conn,$sql3);
  if(!$result3){echo mysqli_error($conn);}
  $row3=mysqli_fetch_array($result3);

  $sql_insert1="insert into bill_summary(bill_id,pname,rate,quantity) values('".$row3['bill_id']."','".$row1['Product_Name']."','".$row1['Price']."','".$quantity."')";
  $result_insert1=mysqli_query($conn,$sql_insert1);
  if(!$result_insert1){echo mysqli_error($conn);}
  header("Location:customerIndex.php");
}
  else {
    $sql_billid="select * from bill_summary where bill_id='".$row2['bill_id']."' and pname='".$row1['Product_Name']."'";
    $result_billid=mysqli_query($conn,$sql_billid);
    if(!$result_billid){echo mysqli_error($conn);}
    $row_billid=mysqli_fetch_array($result_billid);

    if($row_billid['bill_id']==""){
      $sql_insert1="insert into bill_summary(bill_id,pname,rate,quantity) values('".$row2['bill_id']."','".$row1['Product_Name']."','".$row1['Price']."','".$quantity."')";
      $result_insert1=mysqli_query($conn,$sql_insert1);
      if(!$result_insert1){echo mysqli_error($conn);}
    }
    else{
      $qty=$quantity+$row_billid['quantity'];
      $sql4="update bill_summary set quantity=".$qty." where bill_id='".$row_billid['bill_id']."' and pname='".$row_billid['pname']."'";
      $result4=mysqli_query($conn,$sql4);
      if(!$result4){echo mysqli_error($conn);}
    }

    $amount=$amount+$row2['amount'];
    $quantity=$quantity+$row2['quantity'];

    $sql_update="update bill set amount='".$amount."',quantity='".$quantity."' where bill_id='".$row2['bill_id']."'";
    $result_update=mysqli_query($conn,$sql_update);
    if(!$result_update){echo mysqli_error($conn);}
    header("Location:customerIndex.php");
  }

?>
