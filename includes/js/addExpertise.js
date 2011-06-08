function newExpertise(){
    $.ajax({
        type: "GET",
        url: "api/?/getExpertiseTypes",
        dataType : 'json',
        success: function(data) {
        console.log(data);
            var textToInsert = "";
            $.each(data, function(count, list) { 
                textToInsert += "<tr>";            
                textToInsert += "<td>";
                if (list.name == null){
                    var info = "No expertise in db!"
                } else {
                    var info = "<input type='radio' value=" + list.id + " name='expertise_type' />" + list.name + "</>";
                }
                textToInsert += info
                textToInsert += "</td>";
                textToInsert += "</tr>";        
            });
            $("#main_body").append(textToInsert); 
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

        var data = 'expertise_type=' + $("input:radio[name=expertise_type]:checked").val()  + '&name='+ name + '&desc=' + desc;
        $.ajax({
            type: "POST",
            url: "api/?/addExpertise",
            dataType : 'jsonp',
            data: data,
            complete: function(returnObj, returnStatus) {
                $('#main_body').html("<div id='message'></div>");
                $('#message').html("<p>status: Complete</p>")
                .append('<p>Kompetens är nu inlagd i systemet.</p>')
                .hide()
                .fadeIn(1500, function() {
                    $('#message').append("<img id='checkmark' src='/images/check.png' />");
                });
            },
            /* error: function(returnObj) {
            	console.log(returnObj);
                $('#main_body').html("<div id='message'></div>");
                $('#message').html("<p>status: "+returnObj.status+"</p>");
            } */
        });
        return false;
    });

}
