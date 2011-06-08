function addConsult(){
	chooseLanguage();
	$('.error').hide();
	$("input#firstname").select().focus();

	$(".submit").click(function() {
		// validate and process form
		// first hide any error messages
		$('.error').hide();
		var firstname = $("input#firstname").val();
		if (firstname == "") {
			$("label#firstname_error").show();
			$("input#firstname").focus();
			return false;
		}
		var lastname = $("input#lastname").val();
			if (lastname == "") {
			$("label#lastname_error").show();
			$("input#lastname").focus();
			return false;
		}

		var dataString = 'firstname='+ firstname + '&lastname=' + lastname;
		// alert (dataString); return false;

		$.ajax({
			type: "POST",
			url: "api/?/addConsultant",
			dataType : 'json',
			data: dataString,
			success: function(returnObj, returnStatus) {
				$('#main_body').html("<div id='message'></div>");
				$('#message').html("<p>status: " + returnObj.status + "</p>")
				.append('<p>Konsulten är nu inlagd i systemet med id ' + returnObj.id + '</p>')
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
