$(function() {
	$('#createExpertiseType').click(function(){
		$('#main_body').empty();
		$('#main_body').load('includes/html/formCreateExpertiseType.html', newExpertiseType);
					
		function newExpertiseType(){
			$('.error').hide();
			$('input#name').select().focus();
			
			$('.submit').click(function(){
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
				dataType: 'json',
                                data: dataString,
				success: function() {
						$('#createExpertiseType').html("<div id='message'></div>");
						$('#message').html("<h2>Kompetenstyp inlagd i systemet. :D</h2>")
						.append("<p></p>")
						.hide()
						.fadeIn(1500, function() {
							$('#message').append("<img id='checkmark' src='/images/check.png' />");
						});
					}
				});
				return false;
			});
		
		};

	});

});
