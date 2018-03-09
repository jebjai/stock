<?php require_once 'php_action/coredp.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Prompt" rel="stylesheet">
  <title>Stock Management System</title>

  <!-- bootstrap -->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="custom/css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Prompt" rel="stylesheet">

  <style>
    body {
      font-family: 'Prompt', sans-serif;
      /*      color: #fcc87a;*/
      margin: 10px 0px;
      background-color: #fffaf5;
    }

  </style>
</head>

<body>

  <div class="container">
 <?php echo 'role:'.$_SESSION['role'].'<br>';
echo 'username:'.$_SESSION['username1'].'<br>';
echo 'location:'.$_SESSION['location'].'<br>';
echo 'vender:'.$_SESSION['vender'].'<br>';
    ?>
<!--    <form class="form-horizontal" action="">-->

      <?php 
        $sql = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id,
                product.categories_id, product.quantity,product.active, product.status, 
                brands.brand_name, categories.categories_name FROM product 
                INNER JOIN brands ON product.brand_id = brands.brand_id 
                INNER JOIN categories ON product.categories_id = categories.categories_id  
                WHERE product.status = 1 AND brands.brand_name = '".$_SESSION['location']."'";

        $result = $connect->query($sql);
//        $countProduct = $query->num_rows;
            
        while($row = $result->fetch_array()) {
        ?>

      <div class="col-md-4">
        <div class="cardDp">
          <div id="productId" style="display:none">
            <?php echo $row[0]; echo $_SESSION['location']; ?>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-4">
              <div class="cardDpHeaderImage">
                <img class='img-responsive imgCircle' src=<?php echo substr($row[2], strpos($row[2], '.') + 3); ?> style='' />
              </div>
            </div>
            <div class="col-md-8 col-xs-8">
              <div class="cardDpHeader">
                <?php echo $row[1]; ?>
              </div>
              <div class="cardDpHeaderQuantity">
                <?php echo $row[5]; ?>
              </div>
            </div>
          </div>

          <div class="cardDpContainer ">
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-2 ">
                <button type="button" class="btn btn-danger glyphicon glyphicon-minus minus" id="minus"></button>
              </div>
              <div class="col-md-3 col-sm-2 col-xs-3 " style='margin:0px auto;' >
                <input type="text" value="0" class="form-control quantity" id="quantity" style="text-align:center">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2 lowPadding">
                <button type="button" class="btn btn-success glyphicon glyphicon-plus plus " id="plus"></button>
              </div>
              <div class="col-md-4 col-sm-5 col-xs-5">
                <button  type="button" class="btn btn-primary glyphicon glyphicon-flash updateStock" id="updateStock" data-toggle="modal" data-target="#updateDp">&nbsp;ตัดสต็อก</button>
              </div>
            </div>
          </div>



        </div>
        <!-- cardDp -->
      </div><!-- col-md-4-->


      <?php
        } // while

        $connect->close();

        ?>
<!--    </form>-->
    
    
    <!-- Modal -->
<div class="modal fade updateDp" id="updateDp" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitProductForm" action="php_action/updateDp.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> ตัดสต็อก</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>
           
            <div id="modalProductId" style="display:none">
              <input type="text" class="form-control modalProductId" name="modalProductId">

            </div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">สินค้า </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control modalProduct" id="product" placeholder="" name="modalProduct" readonly="readonly" >
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">จำนวน </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input  type="text" class="form-control modalQuantity" id="modalQuantity" placeholder="" name="modalQuantity" readonly="readonly" >
				    </div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">ยืนยัน</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div> <!-- modal -->
    
    
    
    
    
  </div>
</body>

<script src="assests/jquery/jquery.min.js"></script>
<script src="assests/bootstrap/js/bootstrap.min.js"></script>

<script>
  //  $('.plus').click(function() {
  //    var a = $('this.quantity').val();
  //    a++
  //    $('this.quantity').val(a);
  //  });

  $('.plus').click(function() {
    var a = $(this).closest('.cardDpContainer').find('.quantity').val();
    var q = +($(this).closest('.cardDp').find('.cardDpHeaderQuantity').text());

    if (a >= q) {
      return false;
    }
    a++
    $(this).closest('.cardDpContainer').find('.quantity').val(a);
    
  });

  $('.minus').click(function() {
    var b = $(this).closest('.cardDpContainer').find('.quantity').val();
    if (b <= 0) {
      return false;
    }
    b--
    $(this).closest('.cardDpContainer').find('.quantity').val(b);
  });
  
  $('.updateStock').click(function() {
    
    var i = $(this).closest('.cardDp').find('#productId').text();
    var p = $(this).closest('.cardDp').find('.cardDpHeader').text();
    var q = $(this).closest('.cardDpContainer').find('.quantity').val();
    var rq = +($(this).closest('.cardDp').find('.cardDpHeaderQuantity').text());
    if (q > rq) {
      alert("สต็อกไม่พอตัด")
      return false;
    }
    
    $(this).closest('.container').find('.modalProduct').val($.trim(p));
    $(this).closest('.container').find('.modalQuantity').val(q);
    $(this).closest('.container').find('.modalProductId').val(i);
  });

</script>

</html>
