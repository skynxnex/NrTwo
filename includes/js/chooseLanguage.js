function listLanguages() {
	$.post(	'api/?/getExpertise', 
			function(data) {
				var textToInsert = "";
				textToInsert += "<form id='add'><select>";
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
					textToInsert += "<input type='submit' /></form>";  
					$("#main_body").append(textToInsert);
					$("#add").submit(function(){				
		listConsultantsByLanguage($("option:selected").val());
		return false;
		});
			}, 'json'
		);

}

function listConsultantsByLanguage(id){
	var dataString = 'id='+ id;
    $.ajax({
        type: "POST",
        url: "api/?/getConsultantsByLanguage",
        dataType : 'json',
        data : dataString,
        success: function(data) {
           	textToInsert = "<p>Konsulter som kan det valda språket:</p><ul class='language'>";
            $.each(data, function(count, list) {
                if (list.firstname == null){
                    var info = "No consultants with this language!"
                } else {
                    // var info = "<li>" + list.firstname + " " + list.lastname + "</li>";
					var info = "<li>" + list.firstname + " " + list.lastname + " <a href='#' onclick='javascript:show_more()' rel='" + list.id + "'>Visa mer..</a></li>";
                };
                textToInsert += info               
            });
             textToInsert += "</ul>";
             var id = $("option:selected").val();
            $("#main_body").html(textToInsert); 
            listConsultantsByEqLanguage(id);
        }
    });	
}
function listConsultantsByEqLanguage(id){
	var dataString = 'id='+ id;
    $.ajax({
        type: "POST",
        url: "api/?/getConsultantsByEqLanguage",
        dataType : 'json',
        data : dataString,
        success: function(data) {
        	if(data.status == 'fail'){
        		return false;
        	}
            var textToInsert = "<p>Konsulter som kan liknande språk:</p><ul class='language'>";
            $.each(data, function(count, list) {                         
                if (list.firstname == null){
                    return false;
                } else {
                    // var info = "<li>" + list.firstname + " " + list.lastname + "</li>";
					var info = "<li>" + list.firstname + " " + list.lastname 
					+ " kan " + list.language
					+ " <a href='#' onclick='javascript:show_more()' rel='" 
					+ list.id + "'>Visa mer..</a></li>";
                };
                textToInsert += info;                        
            });
            textToInsert += "</ul>";
            $("#main_body").append(textToInsert); 
        }
    });	
}
