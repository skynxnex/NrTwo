function newExpertise(){
	$.ajax({
		type: "GET",
		url: "api/?/getExpertiseTypes",
		dataType : 'json',
		success: function(data) {
			var textToInsert = "";
			$.each(data, function(count, list) { 
				textToInsert += "<tr>";            
				textToInsert += "<td>";
				if (list.name == null){
					var info = "No expertise in db!"
				} else {
					var info = "<input type='radio' value=" + list.id + " name='expertisetype' />" + list.name + "</>";
				};
				textToInsert += info
				textToInsert += "</td>";
				textToInsert += "</tr>";        
			});
			$(".descs").append(textToInsert); 
		}
	});

	$('.error').hide();
	$("input#name").select().focus();

	$(".submit").click(function() {
		// validate and process form
		// first hide any error messages
		$('.error').hide();
		var name = $("input#name").val();
		if (name == "") {
			$("label#name_error").show();
			$("input#name").focus();
			return false;
		}
		var desc = $("input#desc").val();
		if (desc == "") {
			$("label#desc_error").show();
			$("input#desc").focus();
			return false;
		}

		var data = 'expertiseType=' + $("input:radio[name=expertisetype]:checked").val()  + '&name='+ name + '&desc=' + desc;
		$.ajax({
			type: "POST",
			url: "api/?/addExpertise",
			dataType : 'json',
			data: data,
			success: function(returnObj, returnStatus) {
				$('#main_body').html("<div id='message'></div>");
				$('#message').html("<p>status: " + returnObj.status + "</p>")
				.append('<p>Kompetens är nu inlagd i systemet med id ' + returnObj.id + '</p>')
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