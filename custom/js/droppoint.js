var manageDroppointTable;

$(document).ready(function() {
	// top bar active
	$('#navDroppoint').addClass('active');
	
	// manage droppoint table
	manageDroppointTable = $("#manageDroppointTable").DataTable({
		'ajax': 'php_action/fetchDroppoint.php',
		'order': []		
	});

	// submit droppoint form function
	$("#submitDroppointForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var droppointName = $("#droppointName").val();
		var droppointStatus = $("#droppointStatus").val();

		if(droppointName == "") {
			$("#droppointName").after('<p class="text-danger">Droppoint Name field is required</p>');
			$('#droppointName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#droppointName").find('.text-danger').remove();
			// success out for form 
			$("#droppointName").closest('.form-group').addClass('has-success');	  	
		}

	

		if(droppointName) {
			var form = $(this);
			// button loading
			$("#createDroppointBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createDroppointBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageDroppointTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitDroppointForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-droppoint-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit droppoint form function

});

function editDroppoints(droppointId = null) {
	if(droppointId) {
		// remove hidden droppoint id text
		$('#droppointId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-droppoint-result').addClass('div-hide');
		// modal footer
		$('.editDroppointFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedDroppoint.php',
			type: 'post',
			data: {droppointId : droppointId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-droppoint-result').removeClass('div-hide');
				// modal footer
				$('.editDroppointFooter').removeClass('div-hide');

				// setting the droppoint name value 
				$('#editDroppointName').val(response.droppoint_name);
				$('#editDroppointAddress').val(response.droppoint_address);
				$('#editDroppointLocation').val(response.droppoint_location);
				$('#editDroppointContact').val(response.droppoint_contact);
				$('#editDroppointPhone').val(response.droppoint_phone);
				
				// droppoint id 
				$(".editDroppointFooter").after('<input type="hidden" name="droppointId" id="droppointId" value="'+response.droppoint_id+'" />');

				// update droppoint form 
				$('#editDroppointForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var droppointName = $('#editDroppointName').val();
					

					if(droppointName == "") {
						$("#editDroppointName").after('<p class="text-danger">Droppoint Name field is required</p>');
						$('#editDroppointName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editDroppointName").find('.text-danger').remove();
						// success out for form 
						$("#editDroppointName").closest('.form-group').addClass('has-success');	  	
					}

					

					if(droppointName) {
						var form = $(this);

						// submit btn
						$('#editDroppointBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editDroppointBtn').button('reset');

									// reload the manage member table 
									manageDroppointTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-droppoint-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update droppoint form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit droppoints function

function removeDroppoints(droppointId = null) {
	if(droppointId) {
		$('#removeDroppointId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedDroppoint.php',
			type: 'post',
			data: {droppointId : droppointId},
			dataType: 'json',
			success:function(response) {
				$('.removeDroppointFooter').after('<input type="hidden" name="removeDroppointId" id="removeDroppointId" value="'+response.droppoint_id+'" /> ');

				// click on remove button to remove the droppoint
				$("#removeDroppointBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeDroppointBtn").button('loading');

					$.ajax({
						url: 'php_action/removeDroppoint.php',
						type: 'post',
						data: {droppointId : droppointId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeDroppointBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the droppoint table 
								manageDroppointTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the droppoint

				}); // /click on remove button to remove the droppoint

			} // /success
		}); // /ajax

		$('.removeDroppointFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove droppoints function