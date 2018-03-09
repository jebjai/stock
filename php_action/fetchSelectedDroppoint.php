<?php 	

require_once 'core.php';

$droppointId = $_POST['droppointId'];

$sql = "SELECT droppoint_id, droppoint_name, droppoint_address, droppoint_location, droppoint_contact, droppoint_phone FROM droppoint WHERE droppoint_id = $droppointId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);