<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Stock</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addStockModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Stock </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageStockTable">
					<thead>
						<tr>							
							<th>Droppoint</th>
							<th>Product</th>
							<th>Image</th>
							<th>Quantity</th>
<!--							<th style="width:15%;">Options</th>-->
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->




<script src="custom/js/stock.js"></script>

<?php require_once 'includes/footer.php'; ?>