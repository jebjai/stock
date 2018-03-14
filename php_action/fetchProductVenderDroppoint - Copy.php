<?php 	
if(isset($_POST['get_option'])){
  
  require_once 'core.php';
  
  $vender = $_POST['get_option'];

  $sql = "SELECT product.product_id, product.product_name  
        FROM product INNER JOIN brands ON product.brand_id = brands.brand_id 
        WHERE brands.brand_id = '$vender' AND product.active=1 AND product.status=1";
  $result = $connect->query($sql);
  echo "<option value=''>Select</option>";
  while($row = $result->fetch_array()) {
      echo "<option value='".$row[0]."'>".$row[1]."</option>";
  }


  $connect->close();
}

//echo json_encode($output);