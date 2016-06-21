/**
 * manage_stock.js
 */
 $(document).ready(function() {

calculateGrandTotal();

function calculateGrandTotal() {

	var total = 0;
	$("#product-list-table td:nth-child(5)").each(function() {

		var val = $(this).text().replace(" ", "").replace(",-", "");
        total += parseFloat(val);        
	});

	$('#grandTotal').text(total);

}

 });
 /* end of file manage_stock.js */
