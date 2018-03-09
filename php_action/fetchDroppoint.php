<?php 	

require_once 'core.php';

$sql = "SELECT droppoint_id, droppoint_name, droppoint_address, droppoint_location, droppoint_contact, droppoint_phone FROM droppoint WHERE droppoint_active = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();


 while($row = $result->fetch_array()) {
 	$droppointId = $row[0];
 	// active 
 	

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editDroppointModel" onclick="editDroppoints('.$droppointId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeDroppoints('.$droppointId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
        $row[2],
        $row[3],
        $row[4],
        $row[5],
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);