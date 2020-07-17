var manageCustomerTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navNewcustomer').addClass('active');	

	manageCustomerTable = $('#manageCustomerTable').DataTable({
		'ajax' : 'php_action/fetchCustomer.php',
		'order': []
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addCustomerModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitCustomerForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#submitCustomerForm").unbind('submit').bind('submit', function() {

			var customername = $("#customerName").val();
			var phonenumber = $("#phoneNumber").val();
			var address = $("#address").val();

			if(customername == "") {
				$("#customerName").after('<p class="text-danger">Customer Name field is required</p>');
				$('#customerName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customerName").find('.text-danger').remove();
				// success out for form 
				$("#customerName").closest('.form-group').addClass('has-success');	  	
			}

			if(phonenumber == "") {
				$("#phoneNumber").after('<p class="text-danger">Phone Number field is required</p>');
				$('#phoneNumber').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#phoneNumber").find('.text-danger').remove();
				// success out for form 
				$("#phoneNumber").closest('.form-group').addClass('has-success');	  	
			}

			if(address == "") {
				$("#address").after('<p class="text-danger">Address field is required</p>');
				$('#address').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#address").find('.text-danger').remove();
				// success out for form 
				$("#address").closest('.form-group').addClass('has-success');	  	
			}

			if(customername && phonenumber && address) {
				var form = $(this);
				// button loading
				$("#createCustomerBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createCustomerBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageCustomerTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitCustomerForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-categories-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						}  // if
						else{


							// reload the manage member table 
							manageCustomerTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitCustomerForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-categories-messages').html('<div class="alert alert-danger">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-remove-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	

						}

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // submit categories form function
	}); // /on click on submit categories form modal	

}); // /document

// edit categories function
function editCustomer(customerId = null) {
	if(customerId) {
		
		// remove the added categories id 
		$('#editCustomerId').remove();
		// reset the form text
		$("#editCustomerForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-customer-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-customer-result').addClass('div-hide');
		//modal footer
		$(".editCustomerFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {customerId: customerId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-customer-result').removeClass('div-hide');
				//modal footer
				$(".editCustomerFooter").removeClass('div-hide');	

				// set the categories name
				$("#editcustomerName").val(response.name);
				// set the categories status
				$("#editphoneNumber").val(response.phone);
				$("#editAddress").val(response.address);
				
				// add the categories id 
				$(".editCustomerFooter").after('<input type="hidden" name="editCustomerId" id="editCustomerId" value="'+response.id+'" />');


				// submit of edit categories form
				$("#editCustomerForm").unbind('submit').bind('submit', function() {
					var customerName = $("#editcustomerName").val();
					var customerPhone = $("#editphoneNumber").val();
					var customerAddress = $("#editAddress").val();


					if(customerName == "") {
						$("#editcustomerName").after('<p class="text-danger">Customer Name field is required</p>');
						$('#editcustomerName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editcustomerName").find('.text-danger').remove();
						// success out for form 
						$("#editcustomerName").closest('.form-group').addClass('has-success');	  	
					}

					if(customerPhone == "") {
						$("#editphoneNumber").after('<p class="text-danger">Phone  field is required</p>');
						$('#editphoneNumber').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editphoneNumber").find('.text-danger').remove();
						// success out for form 
						$("#editphoneNumber").closest('.form-group').addClass('has-success');	  	
					}
					if(customerAddress == "") {
						$("#editAddress").after('<p class="text-danger">Address field is required</p>');
						$('#editAddress').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAddress").find('.text-danger').remove();
						// success out for form 
						$("#editAddress").closest('.form-group').addClass('has-success');	  	
					}


					if(customerName && customerPhone && customerAddress) {

						var form = $(this);
						// button loading
						$("#editCustomerBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editCustomerBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageCustomerTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-customer-messages').html('<div class="alert alert-success">'+
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
				}); // /submit of edit categories form

			} // /success
		}); // /fetch the selected categories data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit categories function

// remove categories function
function removeCustomer(customerId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedCustomer.php',
		type: 'post',
		data: {customerId: customerId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCustomerBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCustomerBtn").button('loading');

				$.ajax({
					url: 'php_action/removeCustomer.php',
					type: 'post',
					data: {customerId: customerId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeCustomerBtn").button('reset');
							// close the modal 
							$("#removeCustomerModal").modal('hide');
							// update the manage categories table
							manageCustomerTable.ajax.reload(null, false);
							// udpate the messages
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
 							// close the modal 
							$("#removeCustomerModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // /ajax function to fetch the categories data
} // remove categories function