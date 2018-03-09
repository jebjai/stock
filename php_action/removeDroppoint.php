<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$droppointId = $_POST['droppointId'];

if($droppointId) { 

 $sql = "UPDATE droppoint SET droppoint_active = 2 WHERE droppoint_id = {$droppointId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the droppoint";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST