<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: http://localhost/stock/index.php');	
}elseif($_SESSION['location'] != "all") {
    header('location: http://localhost/stock/droppoint.php');
}



?>