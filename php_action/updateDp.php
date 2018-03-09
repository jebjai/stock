<?php 	

require_once '../php_action/coredp.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productId = $_POST['modalProductId'];
    $quantity = $_POST['modalQuantity']; 
    $Product =$_POST['modalProduct'];
  

	$sql = "UPDATE product SET quantity = quantity - '$quantity' WHERE product_id = '$productId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	$connect->close();
//	echo json_encode($valid);
header('location: http://localhost/stock/droppoint.php');	
 
} // /if $_POST