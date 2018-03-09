<?php 

session_start();

require_once 'db_connect.php';


if(!$_SESSION['userId']) {

	header('location: http://localhost/stock/index.php');	
}else {
  if($_SESSION['role'] == "droppoint") {
    header('location: http://localhost/stock/ext/droppoint.php');
  }elseif($_SESSION['role'] == "vender") {
    header('location: http://localhost/stock/ext/vender.php');
  }
}


?>