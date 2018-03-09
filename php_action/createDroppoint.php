<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$droppointName = $_POST['droppointName'];
  $droppointAddress = $_POST['droppointAddress']; 
  $droppointLocation = $_POST['droppointLocation']; 
  $droppointContact = $_POST['droppointContact']; 
  $droppointPhone = $_POST['droppointPhone']; 

	$sql = "INSERT INTO droppoint (droppoint_name, droppoint_address, droppoint_location, droppoint_contact, droppoint_phone, droppoint_active) VALUES ('$droppointName', '$droppointAddress', '$droppointLocation', '$droppointContact', '$droppointPhone', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST