var manageStockTable;

$(document).ready(function() {
	// top bar active
	$('#navStock').addClass('active');
	
	// manage stock table
	manageStockTable = $("#manageStockTable").DataTable({
		'ajax': 'php_action/fetchStock.php',
		'order': []		
	});

	
});

