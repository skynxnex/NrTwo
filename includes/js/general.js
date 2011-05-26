/* 
 *  General javascript functions / stuffs
 */

/* doAjax function (post to db, getJson, search string*/

var bIsSearching = false,
doAjax = function(sURL, sData, oOptions, fnCallback, aCallbackArgs) {
    if (!bIsSearching) {
        var oDynopt = oOptions||{
            dataType: "json",
            type: "get"
        };
        $(document.body).addClass("loading");
        console.log(sURL, fnCallback, oDynopt)
        $.ajax({
            url: sURL,
            data: sData,
             
            success: function(data, aCallbackArgs) {
                $(document.body).removeClass("loading");
                aCallbackArgs = aCallbackArgs||[];
                if (fnCallback) {
                    fnCallback(data, aCallbackArgs);
                }
            },
            ajaxStart: function() {
                bIsSearching = true;
            },
            complete: function() {
                bIsSearching = false;
            },
            dataType: oDynopt.dataType,
            type: oDynopt.type,
            headers: {
                "X-header": "AJAX",
                "Accept": "text/javascript, text/html, application/xml, text/xml, */*"
            }
        })
    }
};

/* Link1 modal popup */

$('a[rel*="link1"]').live('click', function(e) {    
    e.preventDefault();
    $("#opopin").html('');
    $("#opopin:ui-dialog" ).dialog( "destroy" );
    $("#opopin").load('includes/html/inc_link1.html').dialog({
        title: 'Link1',
        modal:true,
        minHeight: 400,
        minWidth: 700,
        draggable: true,
        resizable: true,
        buttons: {
            Close: function() {
                $( this ).html('');
                $( this ).dialog( "close" );
            }
        }
    });
//doAjax("?action=someaction=" + arg, "", null, callJsFunction);
}) 
    
/* Link2 alert popup */

$('a[rel*="link2"]').live('click', function(e) {    
    e.preventDefault();
    alert("hej");
}) 

/* Link3 normal popup with dummy json file */
$('a[rel*="link3"]').live('click', function(e) {    
    e.preventDefault();
    $("#opopin").html('');
    $("#opopin:ui-dialog" ).dialog( "destroy" );
    $("#opopin").load('includes/html/inc_link3.html').dialog({
        title: 'Link3',
        minHeight: 400,
        minWidth: 700,
        draggable: true,
        resizable: true,
        buttons: {
            Close: function() {
                $( this ).html('');
                $( this ).dialog( "close" );
            }
        }
    });
    doAjax("?action=dummyJSON", "", null, listData);
})

/* List data from database*/

function listData(data) {
    alert("listdata");
    console.log(data);
    alert(data);    
    var textToInsert = "";
    $.each(data, function(count, list) {
        textToInsert += "<p> HEJ </p>";
        textToInsert += "<li>";
        textToInsert += list.table1
        textToInsert += "</li>";
        textToInsert += "<li>";
        textToInsert += list.table2
        textToInsert += "</li>";
        textToInsert += "<li>";
        textToInsert += list.table3
        textToInsert += "</li>";
        textToInsert += "<li>";
        textToInsert += list.table4
        textToInsert += "</li>";
        textToInsert += "<li>";
        textToInsert += list.table5
        textToInsert += "</li>";
        textToInsert += "<li>";
        textToInsert += list.table6
        textToInsert += "</li>";
    });
    $("ul.dummy_json").append(textToInsert); 
//append the <li> to an <ul class='name_of_list'>
} 

$('#listConsults').click(function(e) {
    e.preventDefault()
    $('#main_body').empty();
});
/*
$('#createExpertise').click(function(e) {
    e.preventDefault()
    $('#main_body').empty();
}); */

$('#createExpertiseType').click(function(e) {
    e.preventDefault()
    $('#main_body').empty();
});