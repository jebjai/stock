<?php 	

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "stock_db";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// new utf8 *** aud ***
mysqli_set_charset($connect, "utf8");
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>