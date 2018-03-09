<?php 	

require_once 'core.php';

$sql = "SELECT stock.stock_id, stock.droppoint_id, stock.product_id, stock.stock_quantity,
        droppoint.droppoint_name, 
        product.product_name, product.product_image FROM stock
        INNER JOIN droppoint ON stock.droppoint_id = droppoint.droppoint_id
        INNER JOIN product ON stock.product_id = product.product_id
        ";

//$sql = "SELECT stock.stock_id, stock.droppoint_id, stock.product_id, stock.stock_quantity, droppoint.droppoint_name
//         FROM stock
//         INNER JOIN droppoint ON stock.droppoint_id = droppoint.droppoint_id
//       
//        
//        ";

//$sql = "SELECT stock_id, droppoint_id, product_id, stock_quantity
//        FROM stock";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();

 while($row = $result->fetch_array()) {
 $imageUrl = substr($row[6], 3);
	$productImage = "<img class='img-round' src='".$imageUrl."' style='height:35px; width:35px;'  />";

 	$output['data'][] = array( 		
 		$row[4], 		
 		$row[5], 		
 		$productImage, 		
 		$row[3], 		
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);