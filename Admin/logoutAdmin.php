<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}

    unset($_SESSION['aname']);
		header("Location:admin_login.html");

?>
