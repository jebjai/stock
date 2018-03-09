<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Droppoint</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Droppoint</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addDroppointModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Droppoint </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageDroppointTable">
					<thead>
						<tr>							
							<th>Droppoint Name</th>
							<th>Address</th>
							<th>Location</th>
							<th>Contact</th>
							<th>Phone</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addDroppointModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitDroppointForm" action="php_action/createDroppoint.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Droppoint</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-droppoint-messages"></div>

	        <div class="form-group">
	        	<label for="droppointName" class="col-sm-3 control-label">Droppoint Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="droppointName" placeholder="Droppoint Name" name="droppointName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
	        <div class="form-group">
	        	<label for="droppointAddress" class="col-sm-3 control-label">Address</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="droppointAddress" placeholder="Address" name="droppointAddress" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	         	        <div class="form-group">
	        	<label for="droppointLocation" class="col-sm-3 control-label">Location (Lat, Long)</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="droppointLocation" placeholder="13.798555, 100.554179" name="droppointLocation" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	         	        <div class="form-group">
	        	<label for="droppointContact" class="col-sm-3 control-label">Contact </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="droppointContact" placeholder="ชื่อ" name="droppointContact" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	         	        <div class="form-group">
	        	<label for="droppointPhone" class="col-sm-3 control-label">Phone</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="droppointPhone" placeholder="081xxxxxxx" name="droppointPhone" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createDroppointBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit droppoint -->
<div class="modal fade" id="editDroppointModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editDroppointForm" action="php_action/editDroppoint.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Droppoint</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-droppoint-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-droppoint-result">
		      	<div class="form-group">
		        	<label for="editDroppointName" class="col-sm-3 control-label">Droppoint Name</label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editDroppointName" placeholder="Droppoint Name" name="editDroppointName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editDroppointAddress" class="col-sm-3 control-label">Address</label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editDroppointAddress" placeholder="Address" name="editDroppointAddress" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editDroppointLocation" class="col-sm-3 control-label">Location</label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editDroppointLocation" placeholder="Location" name="editDroppointLocation" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editDroppointContact" class="col-sm-3 control-label">Contact</label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editDroppointContact" placeholder="Contact" name="editDroppointContact" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editDroppointPhone" class="col-sm-3 control-label">Phone</label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editDroppointPhone" placeholder="Phone" name="editDroppointPhone" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        
		      </div>         	        
		      <!-- /edit droppoint result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editDroppointFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editDroppointBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit droppoint -->

<!-- remove droppoint -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Droppoint</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeDroppointFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeDroppointBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove droppoint -->

<script src="custom/js/droppoint.js"></script>

<?php require_once 'includes/footer.php'; ?>