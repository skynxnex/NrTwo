

$(function() {
    $('#createExpertise').click(function(e) {
        e.preventDefault();
        $('#main_body').empty();
        $('#main_body').load('includes/html/inc_add_expertise.html', new_expertise);

        function new_expertise(){
		
                
            $.ajax({
                type: "GET",
                url: "api/?/getExpertiseTypes",
                dataType : 'json',
                success: function(data) {
                    //alert(data);
                    var textToInsert = "";
                    $.each(data, function(count, list) {
                        textToInsert += "<p> HEJ </p>";
                        textToInsert += "<li>";
                        textToInsert += list.id
                        textToInsert += "</li>";
                    //$('#new_user_form').html("<div id='message'></div>");
                    });
                    $("ul.descs").append(textToInsert); 
                }
            });
                
            /*
			Alternative code
		
			$(".submit").click(function() {
				$.post('api/?/addConsultant', $("#new_user").serialize(), function(data){
					alert("Done"+data);	
				});
			});
                 */
		
            $('.error').hide();
            $("input#name").select().focus();
            $('input.text-input').css({
                backgroundColor:"#FFFFFF"
            });
            $('input.text-input').focus(function(){
                $(this).css({
                    backgroundColor:"#FFDDAA"
                });
            });
		
            $('input.text-input').blur(function(){
                $(this).css({
                    backgroundColor:"#FFFFFF"
                });
            });
		
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
                    success: function() {
                        $('#new_user_form').html("<div id='message'></div>");
                        $('#message').html("<h2>Konsult inlagd i systemet :D</h2>")
                        .append("<p>Vi hör av oss.</p>")
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