function addConsult(){
	
	$.post("api/?/getExpertise", function(data){
		var textToInsert = "";
		$.each(data, function(count, list) { 
			if (list.name == null){
				var info = "No languages in db!";
			} else {
				var info = "<input name='lang' value='" + list.id + "' type='radio'> " + list.name + "</><br />";
			};
			textToInsert += info
		});
		$("#submit_btn").before(textToInsert); 
	}, "json");
		
	$('.error').hide();
	$("input#firstname").select().focus();

	$("#new_user").submit(function() {
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
		
		$.post("api/?/addConsultant", $("#new_user").serialize(), function(data){
			$('#main_body').html("<div id='message'></div>");
			$('#message').html("<p>status: " + data.status + "</p>")
			.append('<p>Konsulten är nu inlagd i systemet med id ' + data.id + '</p>')
		}, "json");
		return false;
		
	});

}
