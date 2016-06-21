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
                    }
                    else if(response.status == 400) {
                        swal ('Operation failed!', 'Please Try agin after some time', 'error');
                    }
                    else {
                        swal({
                                title: "Info!",
                                text: "<b><span style='color:#ED5565;'>"+$('#addUserEmail').val()+"</span></b>  "+response.status,
                                type: "warning",
                                html: true
                        });
                    }
 				}
 			});

	return false;
});

function calculateGrandTotal() {

	var total = 0;
	$("#product-list-table td:nth-child(5)").each(function() {

		var val = $(this).text().replace(" ", "").replace(",-", "");
        total += parseFloat(val);        
	});

	$('#grandTotal').text(total.toFixed(2));

}

 });
 /* end of file manage_stock.js */

//# sourceMappingURL=application.js.map
