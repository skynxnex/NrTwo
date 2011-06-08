function listLanguages() {
	$.get(	'api/?/getExpertise', 
			function(data) {
				var textToInsert = "";
				textToInsert += "<select>";
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
					textToInsert += "<input type='submit' />";  
					$("#add").append(textToInsert);
			}, 'json'
		);
	$("#add").submit(function(){
		listConsultantsByLanguage($("option:selected").val());
		return false;
		});
}

function listConsultantsByLanguage(id){
	var dataString = 'id='+ id;
    $.ajax({
        type: "POST",
        url: "api/?/getConsultantsByLanguage",
        dataType : 'json',
        data : dataString,
        success: function(data) {
            var textToInsert = "";
            $.each(data, function(count, list) { 
                textToInsert += "<ul>";            
                if (list.firstname == null){
                    var info = "No consultants with this language!"
                } else {
                    // var info = "<li>" + list.firstname + " " + list.lastname + "</li>";
					var info = "<li>" + list.firstname + " " + list.lastname + " <a href='#' onclick='javascript:show_more()' rel='" + list.id + "'>Visa mer..</a></li>";
                };
                textToInsert += info
                textToInsert += "</ul>";        
            });
            $("#main_body").html(textToInsert); 
        }
    });	
}
