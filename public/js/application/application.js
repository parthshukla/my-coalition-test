/**
 * manage_stock.js
 */
 $(document).ready(function() {

calculateGrandTotal();

$('#save-product').click(function() {
	var formData = $('#add-product-form').serialize();
	$.ajax({
		type     : "POST",
		url      : $('meta[name="_home_url"]').attr('content')+"/stock",
		dataType : 'json',
        data     : formData,
 		cache    : false,
 		success  : function(response) {

 					if(response.status == 200) {
                        swal("Added!", "Product added successfully.", "success");

                       $('#product-list-table').prepend('<tr><td>'+response.data.name
                       	+'</td><td>'+response.data.quantity
                       	+'</td><td>'+response.data.price_per_unit
                       	+'</td><td>'+response.data.created_at.date
                       	+'</td><td>'+response.data.total
                       	+'</td></tr>');
                       calculateGrandTotal();
                    }
                    else if(response.status == 500) {
                        swal ('Operation failed!', 'Please Try agin after some time', 'error');
                    }
                    else {

                    	errorString = '';
                    	$.each(response.error,function(key,value) {
                    		errorString += "<li>"+value+"</li>";
                    	});
                        swal({
                                title: "Info!",
                                text: "<div style='color:#ED5565;'><strong>One or more values are not correct.</strong><br/> <ul> "+ errorString +"</ul></div>",
                                type: "warning",
                                html: true
                        });
                    }
 				}
 			});

	return false;
});

/**
 * calculates the grand total of the column.
 *
 * @return float
 */
function calculateGrandTotal() {

	var total = 0;
	$("#product-list-table td:nth-child(5)").each(function() {

		var val = $(this).text().replace(" ", "").replace(",-", "");
        total += parseFloat(val);        
	});

	$('#grandTotal').text(total.toFixed(2));

}

/**
 * Handles the click event.
 *
 */
 $('#add-product-btn').click(function() {

 	$('#add-product-form')[0].reset();
 	
  });

 });
 /* end of file manage_stock.js */

//# sourceMappingURL=application.js.map
