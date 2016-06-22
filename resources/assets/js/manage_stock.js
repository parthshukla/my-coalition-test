/**
 * manage_stock.js
 */
 $(document).ready(function() {

 	setResultToProductNameRow = '';
    setResultToProductQuantityRow = '';
    setResultToProductPriceRow = '';
    setResultToProductTotal = '';

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

 /**
  * Handling edit action
  */
  $('.edit-action').click(function(){

  	var productId = $(this).attr('data-id');
  	$('#editProductId').prop('data-id', productId);

  	/* inititalizing the row objects */
  	setResultToProductNameRow      = $(this).parents("tr").children("td:nth-child(1)");
    setResultToProductQuantityRow = $(this).parents("tr").children("td:nth-child(2)");
    setResultToProductPriceRow = $(this).parents("tr").children("td:nth-child(3)");
    setResultToProductTotal = $(this).parents("tr").children("td:nth-child(5)")


  	/* initializing form fields */
  	$('#editName').val($(this).parents("tr").children("td:nth-child(1)").text());
  	$('#editQuantity').val($(this).parents("tr").children("td:nth-child(2)").text());
  	$('#editPrice').val($(this).parents("tr").children("td:nth-child(3)").text());

  	
  });


  /**
   * 
   */
   $('#edit-product').click(function() {

   	var productId = $('#editProductId').prop('data-id');

   	var formData = {
   		     'name' : $('#editName').val(),
   		     'quantity' : $('#editQuantity').val(),
   		     'price_per_unit' : $('#editPrice').val()
   			};

   	$.ajax({
		type     : "PUT",
		url      : $('meta[name="_home_url"]').attr('content')+"/stock/"+productId,
		dataType : 'json',
        data     : formData,
 		cache    : false,
 		success  : function(response) {

 					if(response.status == 200) {
                        
                        swal("Added!", "Product added successfully.", "success");

                        /* updating the value of the rows dynamically */
                        setResultToProductNameRow.text(response.data.name);
                        setResultToProductQuantityRow.text(response.data.quantity);
                        setResultToProductPriceRow.text(response.data.price_per_unit);
                        setResultToProductTotal.text( response.total );
                        /* updating the grand total */                       
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
  

 });
 /* end of file manage_stock.js */
