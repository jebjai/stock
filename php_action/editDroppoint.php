<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$droppointName = $_POST['editDroppointName'];
  $droppointAddress = $_POST['editDroppointAddress']; 
  $droppointLocation = $_POST['editDroppointLocation']; 
  $droppointContact = $_POST['editDroppointContact']; 
  $droppointPhone = $_POST['editDroppointPhone']; 
  $droppointId = $_POST['droppointId'];

	$sql = "UPDATE droppoint SET droppoint_name = '$droppointName', droppoint_address = '$droppointAddress', droppoint_location = '$droppointLocation', droppoint_contact = '$droppointContact', droppoint_phone = '$droppointPhone' WHERE droppoint_id = '$droppointId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST