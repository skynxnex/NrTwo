function addProject(){
	
	$('.error').hide();
	$( "#startdate" ).datepicker({
        dateFormat: 'yy-mm-dd'});
	$( "#enddate" ).datepicker({
        dateFormat: 'yy-mm-dd'});
	$('input#name').select().focus();
	
		// Choose languange
		$.get(	'api/?/getExpertise', 
			function(data) {
				var textToInsert = "";
				textToInsert += "<p>Välj språk:</p><select>";
				$.each(data, function(count, list) { 
					    if (list.name == null){
					        textToInsert += "<option>No language in db!"
					    } else {
					    textToInsert += "<option value='"+list.id+"'>";
					    	
					        textToInsert += list.name;
					    }
					    textToInsert += "</option>";
					});
					textToInsert += "</select>"; 
					$(textToInsert).insertAfter('#enddate');
			}, 'json'
		);
		//--->
		
	$('.submit').click(function(){
		// validate and process form
		// first hide any error messages
		$('.error').hide();
		var projectname = $('input#name').val();
		if(projectname==""){
			$("label#name_error").show();
			$("input#name").focus();
			return false;
		}
		var startdate = $('input#startdate').val();
		if(startdate==""){
			$("label#startdate_error").show();
			$("input#startdate").focus();
			return false;
		}
		var enddate = $('input#enddate').val();
		if(enddate==""){
			$("label#enddate_error").show();
			$("input#enddate").focus();
			return false;
		}
		
		
		var dataString = 'name=' + projectname + '&startdate=' + startdate + '&enddate=' + enddate + '&language_id=' + $("option:selected").val();
		
		$.ajax({
			type: "POST",
			url: "api/?/addProject",
			dataType : 'json',
			data: dataString,
			success: function(returnObj, returnStatus) {
				$('#main_body').html("<div id='message'></div>");
				$('#message').html("<p>status: " + returnObj.status + "</p>")
				.append('<p>Projektet är nu inlagd i systemet med id ' + returnObj.id + '</p>')
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
