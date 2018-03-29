<?php
session_start();
if($_SESSION['aname']==""){
  header("Location:admin_login.html");
}

    session_destroy();
		header("Location:admin_login.html");

?>
