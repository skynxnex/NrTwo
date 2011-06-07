function listConsultants(){
    $.ajax({
        type: "GET",
        url: "api/?/getConsultants",
        dataType : 'json',
        success: function(data) {
            var textToInsert = "";
            $.each(data, function(count, list) { 
                textToInsert += "<ul>";            
                if (list.firstname == null){
                    var info = "No consultants in db!"
                } else {
                    // var info = "<li>" + list.firstname + " " + list.lastname + "</li>";
					var info = "<li>" + list.firstname + " " + list.lastname + " <a href='#' onclick='javascript:show_more()' rel='" + list.id + "'>Visa mer..</a></li>";
                };
                textToInsert += info
                textToInsert += "</ul>";        
            });
            $("#main_body").append(textToInsert); 
        }
    });
	
	
}	
	
	
function show_more(){
	var consult_id = $(this).attr('rel');
	alert(consult_id);
}
