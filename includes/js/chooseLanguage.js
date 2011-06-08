function chooseLanguage(){
	$.post("api/?/getExpertise", function(data){
			var textToInsert = "";
			$.each(data, function(count, list) { 
				textToInsert += "<form>";
				if (list.name == null){
					var info = "No languages in db!";
				} else {
					var info = "<input type='checkbox'>" + list.name + "</>";
				};
				textToInsert += info
				textToInsert += "</form>";
			});
			$("#new_user_form").append(textToInsert); 
	}, "json");
}
