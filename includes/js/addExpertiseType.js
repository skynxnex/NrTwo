function addExpertiseType(){
	
	$('.error').hide();
	$('input#name').select().focus();
	
	$('.submit').click(function(){
		// validate and process form
		// first hide any error messages
		$('.error').hide();
		var name = $('input#name').val();
		if(name==""){
			$("label#name_error").show();
			$("input#name").focus();
			return false;
		}
		
		var dataString = 'name=' + name;
		
		$.ajax({
			type: "POST",
			url: "api/?/addExpertiseType",
			dataType : 'json',
			data: dataString,
			complete: function(returnObj, returnStatus) {
				$('#main_body').html("<div id='message'></div>");
				$('#message').html("<p>Kompetenstypen " + name + " är nu inlagd i systemet.")
				.hide()
				.fadeIn(1500, function() {
					$('#message').append("<img id='checkmark' src='/images/check.png' />");
				});
			},
			error: function() {
				$('#main_body').html("<div id='message'></div>");
				$('#message').html("<p>status: fail</p>");
			}
		});
		return false;
	});

}
